<?php
namespace controllers;
use PayPalCheckoutSdk\Payments\CapturesRefundRequest;
use Ubiquity\orm\DAO;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
/**
 * Rest Controller RefundController
 * @route("/payments/refunds","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\Refund")
 */
class RefundController extends \Ubiquity\controllers\rest\RestController {
	/**
	 * @options("/{url}")
	 */
	public function options($url) {

    }
    /**
     * @route("/getAll", "methods"=>["get"])
     */
    public function getAll(){
		parent::get("1=1", true);
	}
    /**
     * @route("/addPaypalRefund", "methods"=>["post"])
     */
	public function paypalRefund(){

		$formatter = $this->_getResponseFormatter();
		
		// get posts
		$datas = $this->getDatas();

		// ---------- connect to the activated paypal account ---------------
		$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
		$activatedPaypalAccount = $activatedPaypal->getActivePaypal();

		$clientId = $activatedPaypalAccount->getClientid();
		$clientSecret = $activatedPaypalAccount->getClientsecret();
		$sandboxmode = $activatedPaypalAccount->getSandboxmode();

		$client = $this->client($clientId, $clientSecret, $sandboxmode);
		// ------------------------------------------------------------------

		$request = new CapturesRefundRequest($datas['paymentcaptureid']);
		if($datas['type'] == 0){
			$request->body = "{}";
		}else{
			$request->body = [
				'amount' => [
					'value' => \round($datas['amount'], 2),
					'currency_code' => $datas['currencycode']
				]
			];
		}
		$response = $client->execute($request);
		if($response->statusCode == 201){
			$paypalRefundBody = [
				'capturedpaypalrefundid' => $response->result->id
			];
			$refundBody = [
				'amount' => $datas['amount'],
				'currencycode' => $datas['currencycode'],
				'type' => $datas['type'],
				'payment_transaction_id' => $datas['transactionid']
			];
			//--------------------------- Begin Transaction ----------------------------
			try{
				DAO::beginTransaction();
				// 1- add Paypal Refund
				$paypalRefundBody['paypal_account'] = $activatedPaypalAccount;
				$paypalRefund = $this->addPaypalRefund($paypalRefundBody);
				
				$refundBody['refund_transaction'] = $paypalRefund->getPaypalrefundid();
				$refundBody['paymentmethod'] = 1; // paypal payment id = 1
				// 2- add Refund
				$refund = $this->addRefund($refundBody);
				$refundBody['refundid'] = $refund->getRefundid();
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
			}
			//--------------------------- End Transaction ------------------------------
			$refundBody['status'] = $response->statusCode;
			echo $formatter->format($refundBody);
		}
	}
	private function addRefund($refundBody){

		$model = $this->model;
		$refund = new $model();

		$this->_setValuesToObject($refund, $refundBody);
		$result = DAO::insert($refund);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert refund");
		}
		return $refund;
	}
	private function addPaypalRefund($paypalRefundBody){
		$paypalRefund = new \models\PaypalRefund();
		$this->_setValuesToObject($paypalRefund, $paypalRefundBody);
		$result = DAO::insert($paypalRefund);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert paypal refund");
		}
		return $paypalRefund;
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
