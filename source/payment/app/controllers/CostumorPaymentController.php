<?php
namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\orm\OrmUtils;

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersAuthorizeRequest;

/**
 * Rest Controller CostumorPaymentController
 * @route("/payments/costumorpayments","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\CostumorPayment")
 */
class CostumorPaymentController extends \Ubiquity\controllers\rest\RestController {

	private $transactionCodeInterval = [10000000, 1000000000];
    /**
     * @route("/getPaypalPayment/{token}", "methods"=>["get"])
     */
	public function getPaypalPayment($token){

		$formatter = $this->_getResponseFormatter();

		$tax_percent = 0.2;
		$shipping_amount = 10.00;

		// ---------- connect to the activated paypal account ---------------
		$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
		$activatedPaypalAccount = $activatedPaypal->getActivePaypal();

		$clientId = $activatedPaypalAccount->getClientid();
		$clientSecret = $activatedPaypalAccount->getClientsecret();
		$sandboxmode = $activatedPaypalAccount->getSandboxmode();

		$client = $this->client($clientId, $clientSecret, $sandboxmode);
		// ------------------------------------------------------------------
		// get Payment method (paypal)
		$payment = DAO::getById(\models\Payment::class, 1);
		$transactionmethod = $activatedPaypalAccount->getTransactionmethod();

		if($transactionmethod == 1){ // CAPTURE
			// Paypal Order Capture Request
			$request = new OrdersCaptureRequest($token);
		}else{ // AUTHORIZE
			// Paypal Order authorize Request
			$request = new OrdersAuthorizeRequest($token);
		}

		// Execute & get the response from Paypal
		$response = $client->execute($request);
		
		$statusCode = $response->statusCode;
		
		// response success
		if($statusCode == 201){

			$requestShipping = $response->result->purchase_units[0]->shipping;
			$requestPayment = $response->result->purchase_units[0]->payments;
			$requestPayer = $response->result->payer;

			if($transactionmethod == 1){ // CAPTURE
				$requestCapture = $requestPayment->captures[0];
				$display_status = 1; // display transaction
			}else{ // AUTHORIZE
				$requestCapture = $requestPayment->authorizations[0];
				$display_status = 0; // not display transaction
			}
			$shippingBody = [
				'method' => "United States Postal Service",
				'name' => [
					'full_name' => ($requestShipping->name->full_name ?? "")
				],
				'address' => [
					'address_line_1' => ($requestShipping->address->address_line_1 ?? ""),
					'address_line_2' => ($requestShipping->address->address_line_2 ?? ""),
					'admin_area_2' => ($requestShipping->address->admin_area_2 ?? ""),
					'admin_area_1' => ($requestShipping->address->admin_area_1 ?? ""),
					'postal_code' => ($requestShipping->address->postal_code ?? ""),
					'country_code' => ($requestShipping->address->country_code ?? "")
				]
			];
			$paypalPayerBody = [
				'given_name' => ($requestPayer->name->given_name ?? ""),
				'surname' => ($requestPayer->name->surname ?? ""),
				'email_address' => ($requestPayer->email_address ?? ""),
				'payer_id' => ($requestPayer->payer_id ?? ""),
				'country_code' => ($requestPayer->address->country_code ?? "")
			];
			$createtime = $requestCapture->create_time;
			$createtime = str_ireplace("T", " ", $createtime);
			$createtime = str_ireplace("Z", "", $createtime);

			$payment_status = $requestCapture->status;

			$paypalTransactionBody = [
				'captureid' => $response->result->id,
				'paymentcaptureid' => $requestCapture->id,
				'currencycode' => $requestCapture->amount->currency_code,
				'amountvalue' => $requestCapture->amount->value,
				'paypalfee' => (($transactionmethod == 1 && $payment_status != 'PENDING') ? $requestCapture->seller_receivable_breakdown->paypal_fee->value : 0.00),
				'createtime' => $createtime
			];
			$total_amount = \round($requestCapture->amount->value, 2);
			$datas = [
				'costumorid' => ($requestCapture->custom_id ?? 0),
				'amount' => \round(($total_amount-$shipping_amount)/(1+$tax_percent), 2),
				'tax_total' => \round($tax_percent*($total_amount-$shipping_amount)/(1+$tax_percent), 2),
				'currencycode' => $requestCapture->amount->currency_code,
				'payment_status' => $payment_status,
				'transactionmethod' => $transactionmethod,
				'status' => $display_status,
				'payment' => $payment
			];
			if($transactionmethod == 0){ // AUTHORIZE

				$expiration_time = $requestCapture->expiration_time;
				$expiration_time = str_ireplace("T", " ", $expiration_time);
				$expiration_time = str_ireplace("Z", "", $expiration_time);

				$authorizationBody = [
					'createtime' => $createtime,
					'expiration_date' => $expiration_time,
					'payment' => $payment,
					'authorization_transaction' => 0
				];
			}
			//----------------- Begin transaction ----------------
			try{
				DAO::beginTransaction();
				// 1 - adding paypal Payer informations
				$paypalPayer = new \models\PayerPaypal();
				$this->_setValuesToObject($paypalPayer, $paypalPayerBody);
				$paypalPayer = \models\PayerPaypal::addPaypalPayer($paypalPayer);

				// 2 - adding paypal Transaction
				$paypalTransactionBody['payer'] = $paypalPayer;
				$paypalTransactionBody['paypal_account'] = $activatedPaypalAccount;
				$paypalTransaction = new \models\PaypalTransaction();
				$this->_setValuesToObject($paypalTransaction, $paypalTransactionBody);
				$paypalTransaction = \models\PaypalTransaction::addPaypalTransaction($paypalTransaction);

				// 3 - adding shipping informations
				$shipping = \models\Shipping::addShippingWithBody($shipping_amount, $shippingBody);

				// 4 - adding costumor payment
				$datas['paymenttransaction'] = $paypalTransaction->getPaypaltransactionid();
				$datas['shipping'] = $shipping;
				$costumorPayment = $this->addCostumorPayment($datas, false);
				// 5 - adding authorization (if we have AUTHORIZE type)
				if($transactionmethod == 0){
					$authorizationBody['payment_transaction'] = $costumorPayment;
					$authorization = new \models\Authorization();
					$this->_setValuesToObject($authorization, $authorizationBody);
					\models\Authorization::addAuthorization($authorization);
				}
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
				return;
			}
			//------------------ End transaction -----------------
			echo $formatter->format([
				'status' => 'inserted',
				'transaction_method' => ($transactionmethod == 0 ? 'AUTHORIZE' : 'CAPTURE'),
				'payment_status' => $payment_status,
				'amountvalue' => $paypalTransactionBody['amountvalue'],
				'currencycode' => $paypalTransactionBody['currencycode'],
				'createtime' => $paypalTransactionBody['createtime'],
				'payerfullname' => $paypalPayerBody['surname'] . ' ' . $paypalPayerBody['given_name'],
				'payer_email_address' => $paypalPayerBody['email_address'],
				'payer_id' => $paypalPayerBody['payer_id'],
				'payer_country_code' => $paypalPayerBody['country_code'],
				'shippingname' => $shippingBody['name']['full_name'],
				'shippingadress' => $shippingBody['address']['address_line_1'] . ', ' . $shippingBody['address']['address_line_2'] . ', ' . $shippingBody['address']['admin_area_2'] . ', ' . $shippingBody['address']['admin_area_1'] . ' ' . $shippingBody['address']['postal_code'] . ', ' . $shippingBody['address']['country_code']
			]);
		}
	}
	/**
	 * @options("/{url}")
	 */
	public function options($url) {}
    /**
     * @route("/getAll", "methods"=>["get"])
     */
    public function getAll(){
		parent::get("status=1", true);
	}
    /**
     * @route("/get_refunds/{costumorPaymentId}", "methods"=>["get"])
     */
    public function getRefunds($costumorPaymentId){
		$this->_getOneToMany($costumorPaymentId, "refunds");
	}
    /**
     * @route("/addPayment", "methods"=>["post"])
     */
    public function addPayment(){
		$formatter = $this->_getResponseFormatter();
		// get posts
		$datas = $this->getDatas();

		$paymentMethod = \intval($datas['paymentMethod'] ?? 0);
		// check if payment Method is enabled
		$payment = DAO::getById(\models\Payment::class, $paymentMethod);
		if($payment == null){
			echo $formatter->format(["status" => "global_error","title" => "this payment not exists"]);
			return;
		}else{
			if(!$payment->getStatus()){
				echo $formatter->format(["status" => "global_error","title" => "this payment is disabled"]);
				return;
			}
		}
		//------------------------ Amount & taxes -----------------------
		$currency_code = 'USD';
		$item_total = $datas['amount'];
		$tax_total = 0.2*$item_total;
		$shipping_amount = 10.00;
		$total_amount = $item_total + $tax_total + $shipping_amount;

		// 2 decimal precision
		$total_amount = \round($total_amount, 2);
		$shipping_amount = \round($shipping_amount, 2);
		$tax_total = \round($tax_total, 2);
		$item_total = \round($item_total, 2);

		//shipping informations
		$shippingBody = [
			'method' => 'United States Postal Service',
			'name' => [
				'full_name' => 'LAGRIDA Yassine',
			],
			'address' => [
				'address_line_1' => '123 Townsend St',
				'address_line_2' => 'Floor 6',
				'admin_area_2' => 'San Francisco',
				'admin_area_1' => 'CA',
				'postal_code' => '94107',
				'country_code' => 'US',
			]
		];
		// Manage Paypal Payment
		if($paymentMethod == 1){
			// ---------- connect to the activated paypal account ---------------
			$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
			$activatedPaypalAccount = $activatedPaypal->getActivePaypal();

			$clientId = $activatedPaypalAccount->getClientid();
			$clientSecret = $activatedPaypalAccount->getClientsecret();
			$sandboxmode = $activatedPaypalAccount->getSandboxmode();

			$client = $this->client($clientId, $clientSecret, $sandboxmode);
			// ------------------------------------------------------------------
			$transactionmethod = $activatedPaypalAccount->getTransactionmethod();
			$method = ($transactionmethod == 0 ? 'AUTHORIZE' : 'CAPTURE');
			//--------------------- Paypal Request ---------------------------
			// Paypal amounts information
			$amountBody = [
				'currency_code' => $currency_code,
				'value' => $total_amount,
				'breakdown' => [
					'item_total' => [
						'currency_code' => $currency_code,
						'value' => $item_total
					],
					'shipping' => [
						'currency_code' => $currency_code,
						'value' => $shipping_amount
					],
					'tax_total' => [
						'currency_code' => $currency_code,
						'value' => $tax_total
					]
				]
			];
			$request = new OrdersCreateRequest();
			$request->headers["prefer"] = "return=representation";
			$request->body = $this->requestBody($method, $datas['origin'], $amountBody, $datas['costumorid'], $shippingBody);

			$order = $client->execute($request);

			echo $formatter->format([
				"status" => "paypalResponse",
				"statusCode" => $order->statusCode,
				"approv" => $order->result->links[1]->href
			]);
			return;
		}
		// Manage Gift Card Payment
		if($paymentMethod == 2){
			$getGiftCard = DAO::getOne(\models\GiftCardAdmin::class, ['code'=>($datas['code'] ?? "")]);
			if($getGiftCard == null){
				echo $formatter->format(["status" => "gift_card_error","title" => "this gift card code not exists"]);
				return;
			}else{
				$giftCardtimesUsed = $getGiftCard->getUsed();
				if(!$getGiftCard->getStatus()){
					echo $formatter->format(["status" => "gift_card_error","title" => "this gift card is disabled"]);
					return;
				}
				else if($getGiftCard->getExpiration_date() < date("Y-m-d H:i:s")){
					echo $formatter->format(["status" => "gift_card_error","title" => "this gift card was expired"]);
					return;
				}
				else if($getGiftCard->getMax_use() != -1 && $getGiftCard->getMax_use() <= $giftCardtimesUsed){
					echo $formatter->format(["status" => "gift_card_error","title" => "this gift card is fully used"]);
					return;
				}
				else{
					//------------------------ Begin Transaction ------------------------
					try{
						DAO::beginTransaction();
						// add gift Card Transaction
						$giftCardTransaction = new \models\GiftCardTransaction();
						$giftCardTransaction->setGiftcard($getGiftCard);
						$giftCardTransaction = \models\GiftCardTransaction::addGiftCardTransaction($giftCardTransaction);

						$paymenttransaction = $giftCardTransaction->getGiftcardtransactionid();

						$datas['currencycode'] = $currency_code;
						$datas['tax_total'] = $tax_total;
						$datas['paymenttransaction'] = $paymenttransaction;
						// add Shipping
						$shipping = \models\Shipping::addShippingWithBody($shipping_amount, $shippingBody);
						// add Costumor Payment Transaction
						$datas['payment'] = $payment;
						$datas['shipping'] = $shipping;
						$datas['payment_status'] = "COMPLETED";
						$this->addCostumorPayment($datas);
						DAO::commit();
					}catch(\Exception $e){
						DAO::rollBack();
						echo $formatter->format(["status" => "not_inserted"]);
						return;
					}
					//------------------------- End Transaction ------------------------
				}
			}
		}
	}

	private function addCostumorPayment($datas, $displayMsg=true){
		
		$model = $this->model;
		$instance = new $model();

		$formatter = $this->_getResponseFormatter();

		do{
			$transactioncode = random_int($this->transactionCodeInterval[0], $this->transactionCodeInterval[1]);
			$getCostumorPayment = DAO::getOne(\models\CostumorPayment::class, ['transactioncode'=>$transactioncode]);
		}while($getCostumorPayment != null);
		$datas['transactioncode'] = $transactioncode;
		// assign values posted to the $instance
		$this->_setValuesToObject($instance, $datas);
		$fields = \array_keys(OrmUtils::getSerializableFields($model));
		// validation of violations
		if($this->_validateInstance($instance, $fields, ['id' => false])){
			// Adding to database
			$result = $this->AddOperation($instance, $datas, true);
			if($result){
				if($displayMsg){
					echo $formatter->format(["status" => "inserted"]);
				}
				return $instance;
			}else{
				throw new \Exception("Unable to insert the instance Costumor Payment");
			}
		}else{
			// show violation errors
			$this->displayErrors();
		}
	}
	private function requestBody($method, $origin, $amountBody, $costumorid, $shippingBody){
		return [
            'intent' => $method,
            'application_context' => [
                'return_url' => $origin . '/paymentPaypal',
                'cancel_url' => $origin,
                'brand_name' => 'PULSE Digital',
                'locale' => 'en-US',
                'landing_page' => 'BILLING',
                'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                'user_action' => 'PAY_NOW'
            ],
            'purchase_units' => [
                0 => [
                    'reference_id' => 'PUHF',
                    'description' => 'Sporting Goods',
                    'custom_id' => $costumorid,
                    'soft_descriptor' => 'HighFashions',
                    'amount' => $amountBody,
					'shipping' => $shippingBody
                ]
        	]
        ];
	}
	private function client($clientId, $clientSecret, $sandboxmode){
		if($sandboxmode){
			$environment = new SandboxEnvironment($clientId, $clientSecret);
		}else{
			$environment = new ProductionEnvironment($clientId, $clientSecret);
		}
		$client = new PayPalHttpClient($environment);
		return $client;
	}
}
