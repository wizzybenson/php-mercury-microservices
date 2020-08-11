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
	public function getPaypalPayment($token) {
		/*if($token == ""){
			return;
		}*/
		$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
		$sandboxmode = $activatedPaypal->getActivePaypal()->getSandboxmode();
		$clientId = $activatedPaypal->getActivePaypal()->getClientid();
		$clientSecret = $activatedPaypal->getActivePaypal()->getClientsecret();
		$request = new OrdersCaptureRequest($token);
		$client = $this->client($clientId, $clientSecret, $sandboxmode);
		$response = $client->execute($request);
		$formatter = $this->_getResponseFormatter();

		$statusCode = $response->statusCode;
		$captureid = $response->result->id;
		$shippingname = $response->result->purchase_units[0]->shipping->name->full_name;
		$shippingadress = $response->result->purchase_units[0]->shipping->address->address_line_1 . 
					", " . $response->result->purchase_units[0]->shipping->address->address_line_2 .
					", " . $response->result->purchase_units[0]->shipping->address->admin_area_2 . 
					", " . $response->result->purchase_units[0]->shipping->address->admin_area_1 . 
					" " . $response->result->purchase_units[0]->shipping->address->postal_code . 
					", " . $response->result->purchase_units[0]->shipping->address->country_code;
		$paymentcaptureid = $response->result->purchase_units[0]->payments->captures[0]->id;
		$currencycode = $response->result->purchase_units[0]->payments->captures[0]->amount->currency_code;
		$amountvalue = $response->result->purchase_units[0]->payments->captures[0]->amount->value;
		$paypalfee = $response->result->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value;
		$createtime = $response->result->purchase_units[0]->payments->captures[0]->create_time;
		$payerid = $response->result->payer->payer_id;
		$payeremail = $response->result->payer->email_address;
		$createtime = str_ireplace("T", " ", $createtime);
		$createtime = str_ireplace("Z", "", $createtime);

		//if($statusCode == 201){
			// Adding fields to database :
			$paypalTransaction = new \models\PaypalTransaction();

			$paypalTransaction->setCaptureid($captureid);
			$paypalTransaction->setShippingname($shippingname);
			$paypalTransaction->setShippingadress($shippingadress);
			$paypalTransaction->setPaymentcaptureid($paymentcaptureid);
			$paypalTransaction->setCurrencycode($currencycode);
			$paypalTransaction->setAmountvalue($amountvalue);
			$paypalTransaction->setPaypalfee($paypalfee);
			$paypalTransaction->setCreatetime($createtime);
			$paypalTransaction->setPayerid($payerid);
			$paypalTransaction->setPayeremail($payeremail);

			
			DAO::save($paypalTransaction);

			$datas = [];
			$datas['costumorid'] = 6; // on va revenir ici aprés
			$datas['amount'] = 220; // on va revenir ici aprés
			$datas['transactiondate'] = $createtime;
			$model = $this->model;
			$instance = new $model();
			$payment = DAO::getById(\models\Payment::class, 1);
			$datas['paymenttransaction'] = $paypalTransaction->getPaypaltransactionid();
			$this->addCostumorPayment($datas, $model, $instance, $payment, $this->transactionCodeInterval, $formatter, false);
			echo $formatter->format([
				"shippingname" => $shippingname,
				"shippingadress" => $shippingadress,
				"amountvalue" => $amountvalue,
				"currencycode" => $currencycode,				
				"createtime" => $createtime
			]);
		//}
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
     * @route("/addPayment", "methods"=>["post"])
     */
    public function addPayment(){
		$formatter = $this->_getResponseFormatter();
		$model = $this->model;
		$instance = new $model();
		if (isset($instance)){
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
			// Manage Paypal Payment
			if($paymentMethod == 1){
				$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
				$sandboxmode = $activatedPaypal->getActivePaypal()->getSandboxmode();
				$clientId = $activatedPaypal->getActivePaypal()->getClientid();
				$clientSecret = $activatedPaypal->getActivePaypal()->getClientsecret();
				//$transactionmethod = $activatedPaypal->getActivePaypal()->getTransactionmethod();
				//$method = (!$transactionmethod ? 'AUTHORIZE' : 'CAPTURE');
				$method = 'CAPTURE';
				//echo $method;
				//--------------------- Paypal Request ---------------------------
				$request = new OrdersCreateRequest();
				$request->headers["prefer"] = "return=representation";
				$request->body = $this->requestBody($method, $datas['origin']);

				$client = $this->client($clientId, $clientSecret, $sandboxmode);
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
				$paymenttransaction = $this->addGiftCardTransaction($datas['code'], $formatter);
				if($paymenttransaction == null){
					return;
				}
				$datas['paymenttransaction'] = $paymenttransaction;
				$this->addCostumorPayment($datas, $model, $instance, $payment, $this->transactionCodeInterval, $formatter);
			}
		}else{
			$this->_setResponseCode(404);
			echo $formatter->format(["message" => "No result found","keyValues" => []]);
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
			// create & insert giftCardTransaction
			$giftCardTransaction = new \models\GiftCardTransaction();
			$giftCardTransaction->setGiftcardid($getGiftCard->getGiftcardid());
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
	private function addCostumorPayment($datas, $model, $instance, $payment, $transactionCodeInterval, $formatter, $displayMsg=true){
		do{
			$transactioncode = random_int($transactionCodeInterval[0], $transactionCodeInterval[1]);
			$getCostumorPayment = DAO::getOne(\models\CostumorPayment::class, ['transactioncode'=>$transactioncode]);
		}while($getCostumorPayment != null);
		$datas['transactioncode'] = $transactioncode;
		$instance->setPayment($payment);
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
	private function requestBody($method, $origin){
		return [
			'intent' => $method,
			'application_context' =>
				[
					'return_url' => $origin . '/paymentPaypal',
					'cancel_url' => 'https://example.com/cancel',
					'brand_name' => 'PULSE Digital',
					'locale' => 'en-US',
					'landing_page' => 'BILLING',
					'shipping_preference' => 'SET_PROVIDED_ADDRESS',
					'user_action' => 'PAY_NOW',
				],
			'purchase_units' =>
				[
					0 =>
						[
							'reference_id' => 'PUHF',
							'description' => 'Sporting Goods',
							'custom_id' => 'CUST-HighFashions',
							'soft_descriptor' => 'HighFashions',
							'amount' =>
								[
									'currency_code' => 'USD',
									'value' => '220.00',
									'breakdown' =>
										[
											'item_total' =>
												[
													'currency_code' => 'USD',
													'value' => '180.00',
												],
											'shipping' =>
												[
													'currency_code' => 'USD',
													'value' => '20.00',
												],
											'handling' =>
												[
													'currency_code' => 'USD',
													'value' => '10.00',
												],
											'tax_total' =>
												[
													'currency_code' => 'USD',
													'value' => '20.00',
												],
											'shipping_discount' =>
												[
													'currency_code' => 'USD',
													'value' => '10.00',
												],
										],
								],
							'items' =>
								[
									0 =>
										[
											'name' => 'T-Shirt',
											'description' => 'Green XL',
											'sku' => 'sku01',
											'unit_amount' =>
												[
													'currency_code' => 'USD',
													'value' => '90.00',
												],
											'tax' =>
												[
													'currency_code' => 'USD',
													'value' => '10.00',
												],
											'quantity' => '1',
											'category' => 'PHYSICAL_GOODS',
										],
									1 =>
										[
											'name' => 'Shoes',
											'description' => 'Running, Size 10.5',
											'sku' => 'sku02',
											'unit_amount' =>
												[
													'currency_code' => 'USD',
													'value' => '45.00',
												],
											'tax' =>
												[
													'currency_code' => 'USD',
													'value' => '5.00',
												],
											'quantity' => '2',
											'category' => 'PHYSICAL_GOODS',
										],
								],
							'shipping' =>
								[
									'method' => 'United States Postal Service',
									'name' =>
										[
											'full_name' => 'Yassine LAGRIDA',
										],
									'address' =>
										[
											'address_line_1' => '123 Townsend St',
											'address_line_2' => 'Floor 6',
											'admin_area_2' => 'Marrakesh',
											'admin_area_1' => 'CA',
											'postal_code' => '94107',
											'country_code' => 'MA',
										],
								],
						],
				],
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
