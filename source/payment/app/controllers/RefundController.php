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
     * @route("/addPaymentRefund", "methods"=>["post"])
     */
	public function addPaymentRefund(){

		$formatter = $this->_getResponseFormatter();
		
		// get posts
		$datas = $this->getDatas();
		$payment_method = \intval($datas['payment'] ?? 0);
		$payment_transaction = DAO::getById(\models\CostumorPayment::class, $datas['transactionid']);
		if($payment_method == 1){ // paypal Refund
			// ---------- connect to the activated paypal account ---------------
			$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
			$activatedPaypalAccount = $activatedPaypal->getActivePaypal();

			$clientId = $activatedPaypalAccount->getClientid();
			$clientSecret = $activatedPaypalAccount->getClientsecret();
			$sandboxmode = $activatedPaypalAccount->getSandboxmode();

			$client = $this->client($clientId, $clientSecret, $sandboxmode);
			// ------------------------------------------------------------------
			if($datas['transactionmethod'] == 1){ // capture
				$paypalRefundId = $datas['paymentcaptureid'];
			}else{ // AUTHORIZE
				$authorization = DAO::uGetOne(\models\Authorization::class, "payment_transaction.transactionid= ?", true, [$datas['transactionid']]);
				$paypalAuthorization = DAO::getById(\models\PaypalAuthorization::class, $authorization->getAuthorization_transaction());

				$paypalRefundId = $paypalAuthorization->getAuthorized_paypal_id();
			}
			$request = new CapturesRefundRequest($paypalRefundId);

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
			$statusCode = $response->statusCode;
			$success = ($statusCode == 201);
		}
		if($success){
			$refundBody = [
				'amount' => $datas['amount'],
				'currencycode' => $datas['currencycode'],
				'type' => $datas['type'],
				'payment_transaction' => $payment_transaction,
				'payment' => DAO::getById(\models\Payment::class, $payment_method)
			];
			//--------------------------- Begin Transaction ----------------------------
			try{
				DAO::beginTransaction();
				if($payment_method == 1){ // Paypal Refund
					$paypalRefundBody = [
						'capturedpaypalrefundid' => $response->result->id
					];
					// 1- add Paypal Refund
					$paypalRefundBody['paypal_account'] = $activatedPaypalAccount;
					$paypalRefund = new \models\PaypalRefund();
					$this->_setValuesToObject($paypalRefund, $paypalRefundBody);
					$paypalRefund = \models\PaypalRefund::addPaypalRefund($paypalRefund);

					$refund_transaction = $paypalRefund->getPaypalrefundid();
				}
				// 2- add Refund
				$refundBody['refund_transaction'] = $refund_transaction;
				$refund = new \models\Refund();
				$this->_setValuesToObject($refund, $refundBody);
				$refund = \models\Refund::addRefund($refund);

				$refundBody['refundid'] = $refund->getRefundid();
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
				echo $formatter->format(["status" => "not_refunded"]);
				return;
			}
			//--------------------------- End Transaction ------------------------------
			$refundBody['status'] = $response->statusCode;
			echo $formatter->format($refundBody);
		}
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
