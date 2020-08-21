<?php
namespace controllers;

use Ubiquity\orm\DAO;
use Ubiquity\orm\OrmUtils;

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

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

		// Paypal Order Capture Request
		$request = new OrdersCaptureRequest($token);

		// connect to the activated paypal account
		$client = $this->client();

		// Execute & get the response from Paypal
		$response = $client->execute($request);

		$statusCode = $response->statusCode;
		// response success
		if($statusCode == 201){

			$requestShipping = $response->result->purchase_units[0]->shipping;
			$requestCapture = $response->result->purchase_units[0]->payments->captures[0];
			$requestPayer = $response->result->payer;

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
			$paypalTransactionBody = [
				'captureid' => $response->result->id,
				'paymentcaptureid' => $requestCapture->id,
				'currencycode' => $requestCapture->amount->currency_code,
				'amountvalue' => $requestCapture->amount->value,
				'paypalfee' => $requestCapture->seller_receivable_breakdown->paypal_fee->value,
				'createtime' => $createtime
			];
			$total_amount = \round($requestCapture->amount->value, 2);
			$datas = [
				'costumorid' => ($requestCapture->custom_id ?? 0),
				'amount' => \round(($total_amount-$shipping_amount)/(1+$tax_percent), 2),
				'tax_total' => \round($tax_percent*($total_amount-$shipping_amount)/(1+$tax_percent), 2),
				'currencycode' => $requestCapture->amount->currency_code
			];
			//----------------- Begin transaction ----------------
			try{
				DAO::beginTransaction();
				// 1 - adding paypal Payer informations
				$paypalPayer = $this->addPaypalPayer($paypalPayerBody);

				// 2 - adding paypal Transaction
				$paypalTransactionBody['payer'] = $paypalPayer;
				$paypalTransaction = $this->addPaypalTransaction($paypalTransactionBody);

				// 3 - adding shipping informations
				$shipping = $this->addShipping($shipping_amount, $shippingBody);

				// 4 - adding costumor payment
				$payment = DAO::getById(\models\Payment::class, 1);
				$datas['payment'] = $payment;
				$datas['paymenttransaction'] = $paypalTransaction->getPaypaltransactionid();
				$datas['shipping'] = $shipping;
				$this->addCostumorPayment($datas, false);
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
			}
			//------------------ End transaction -----------------
			echo $formatter->format([
				'status' => 'inserted',
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
		parent::get("1=1", true);
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
			//$transactionmethod = $activatedPaypal->getActivePaypal()->getTransactionmethod();
			//$method = (!$transactionmethod ? 'AUTHORIZE' : 'CAPTURE');
			$method = 'CAPTURE';
			//echo $method;
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

			$client = $this->client();

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
			//------ Begin Transaction ------
			try{
				DAO::beginTransaction();
				// add gift Card Transaction
				$paymenttransaction = $this->addGiftCardTransaction($datas['code'], $formatter);
				if($paymenttransaction == null){
					return;
				}
				$datas['currencycode'] = $currency_code;
				$datas['tax_total'] = $tax_total;
				$datas['paymenttransaction'] = $paymenttransaction;
				// add Shipping
				$shippingObject = $this->addShipping($shipping_amount, $shippingBody);
				// add Costumor Payment Transaction
				$datas['payment'] = $payment;
				$datas['shipping'] = $shippingObject;
				$this->addCostumorPayment($datas);
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
			}
			//------ End Transaction ------
		}
	}
	private function addGiftCardTransaction($code, $formatter){
		$getGiftCard = DAO::getOne(\models\GiftCardAdmin::class, ['code'=>($code ?? "")]);
		if($getGiftCard == null){
			echo $formatter->format(["status" => "gift_card_error","title" => "this gift card code not exists"]);
			return null;
		}else{
			$giftCardUsed = $getGiftCard->getUsed();
			if(!$getGiftCard->getStatus()){
				echo $formatter->format(["status" => "gift_card_error","title" => "this gift card is disabled"]);
				return null;
			}
			if($getGiftCard->getExpiration_date() < date("Y-m-d H:i:s")){
				echo $formatter->format(["status" => "gift_card_error","title" => "this gift card was expired"]);
				return null;
			}
			if($getGiftCard->getMax_use() != -1 && $getGiftCard->getMax_use() <= $giftCardUsed){
				echo $formatter->format(["status" => "gift_card_error","title" => "this gift card is fully used"]);
				return null;
			}
			// insert giftCardTransaction
			$giftCardTransaction = new \models\GiftCardTransaction();
			$giftCardTransaction->setGiftcard($getGiftCard);
			$result = DAO::save($giftCardTransaction);
			if($result){
				// add +1 to used in gift Cards
				$giftCardUsed++;
				$getGiftCard->setUsed($giftCardUsed);
				$result = DAO::save($getGiftCard);
				if(!$result){
					throw new \Exception("Unable to update the instance gift Card");
				}
			}else{
				throw new \Exception("Unable to insert the instance giftCardTransaction");
			}
			return $giftCardTransaction->getGiftcardtransactionid();
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
			}else{
				throw new \Exception("Unable to insert the instance Costumor Payment");
			}
		}else{
			// show violation errors
			$this->displayErrors();
		}
	}
	private function addShipping($amount, $shippingBody){

		$shipping = new \models\Shipping();
		$shipping->setAmount($amount);
		$shipping->setMethod($shippingBody['method']);
		$shipping->setFull_name($shippingBody['name']['full_name']);
		$shipping->setAddress_line_1($shippingBody['address']['address_line_1']);
		$shipping->setAddress_line_2($shippingBody['address']['address_line_2']);
		$shipping->setAdmin_area_2($shippingBody['address']['admin_area_2']);
		$shipping->setAdmin_area_1($shippingBody['address']['admin_area_1']);
		$shipping->setPostal_code($shippingBody['address']['postal_code']);
		$shipping->setCountry_code($shippingBody['address']['country_code']);

		$result = DAO::save($shipping);

		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert shipping");
		}
		return $shipping;

	}
	private function addPaypalTransaction($paypalTransactionBody){
		$paypalTransaction = new \models\PaypalTransaction();
		$this->_setValuesToObject($paypalTransaction, $paypalTransactionBody);
		$result = DAO::insert($paypalTransaction);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert paypal transaction");
		}
		return $paypalTransaction;
	}
	private function addPaypalPayer($paypalPayerBody){
		$paypalPayer = new \models\PayerPaypal();
		$this->_setValuesToObject($paypalPayer, $paypalPayerBody);
		$result = DAO::insert($paypalPayer);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert paypal payer");
		}
		return $paypalPayer;
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
	private function client(){
		// get the activated paypal business account
		$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);

		$sandboxmode = $activatedPaypal->getActivePaypal()->getSandboxmode();
		$clientId = $activatedPaypal->getActivePaypal()->getClientid();
		$clientSecret = $activatedPaypal->getActivePaypal()->getClientsecret();

		if($sandboxmode){
			$environment = new SandboxEnvironment($clientId, $clientSecret);
		}else{
			$environment = new ProductionEnvironment($clientId, $clientSecret);
		}
		$client = new PayPalHttpClient($environment);
		return $client;
	}
}
