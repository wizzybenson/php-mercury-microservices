<?php
namespace controllers;
use Ubiquity\orm\DAO;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Payments\AuthorizationsCaptureRequest;
/**
 * Rest Controller AuthorizationController
 * @route("/payments/authorizations","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\Authorization")
 */
class AuthorizationController extends \Ubiquity\controllers\rest\RestController {
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
     * @route("/getCountNotCaptured", "methods"=>["get"])
     */
    public function getCountNotCaptured(){
		$formatter = $this->_getResponseFormatter();
		$count = DAO::count($this->model, 'status = ?', [0]);
		echo $formatter->format(["CountNotCaptured" => $count]);
	}
	/**
     * @route("/captureAuth", "methods"=>["post"])
     */
	public function captureAuth(){

		$formatter = $this->_getResponseFormatter();

		// get posts
		$datas = $this->getDatas();
		$payment_method = \intval($datas['payment'] ?? 0);

		if($payment_method == 1){ // paypal Refund
			// ---------- connect to the activated paypal account ---------------
			$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
			$activatedPaypalAccount = $activatedPaypal->getActivePaypal();

			$clientId = $activatedPaypalAccount->getClientid();
			$clientSecret = $activatedPaypalAccount->getClientsecret();
			$sandboxmode = $activatedPaypalAccount->getSandboxmode();

			$client = $this->client($clientId, $clientSecret, $sandboxmode);
			// ------------------------------------------------------------------

			$paypalTransaction = DAO::getById(\models\PaypalTransaction::class, $datas['paypal_transaction']);

			$request = new AuthorizationsCaptureRequest($paypalTransaction->getPaymentcaptureid());
			$request->body = "{}";
			$response = $client->execute($request);
			$statusCode = $response->statusCode;
			$success = ($statusCode == 201);
		}
		if($success){

			//--------------------------- Begin Transaction ----------------------------
			try{
				DAO::beginTransaction();
				if($payment_method == 1){ // Paypal Refund
					$paypalAuthorizationBody = [
						'authorized_paypal_id' => $response->result->id
					];
					// 1 - adding paypal authorization
					$paypalAuthorizationBody['paypal_account'] = $activatedPaypalAccount;
					$paypalAuthorization = new \models\PaypalAuthorization();
					$this->_setValuesToObject($paypalAuthorization, $paypalAuthorizationBody);
					$paypalAuthorization = \models\PaypalAuthorization::addPaypalAuthorization($paypalAuthorization);
					$authorization_transaction = $paypalAuthorization->getAuthorizationid();
				}
				// 2 - set Authorization
				$authorization = DAO::getById(\models\Authorization::class, $datas['authorizationid']);
				$authorization->setCapture_date(date("Y-m-d H:i:s"));
				$authorization->setAuthorization_transaction($authorization_transaction);
				$authorization->setStatus(1);
				$result = DAO::update($authorization);
				if(!$result){
					// very important to check sql transaction
					throw new \Exception("Unable to update Authorization");
				}
				// 2 - set costumorPayment
				$costumorPayment = $authorization->getPayment_transaction();
				$costumorPayment->setStatus(1);
				$costumorPayment->setPayment_status($response->result->status);
				$result = DAO::update($costumorPayment);
				if(!$result){
					// very important to check sql transaction
					throw new \Exception("Unable to update costumorPayment");
				}
				DAO::commit();
			}catch(\Exception $e){
				DAO::rollBack();
				return;
			}
			//--------------------------- End Transaction ------------------------------
			echo $formatter->format(["status" => "captured"]);
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
