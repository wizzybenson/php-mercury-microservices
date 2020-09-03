<?php
namespace controllers;

use Ubiquity\orm\DAO;

/**
 * Rest Controller ActivatedPaypalController
 * @route("/payments/activated_paypal","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\ActivatedPaypal")
 */
class ActivatedPaypalController extends \Ubiquity\controllers\rest\RestController {
    
	/**
	 * @options("/{url}")
	 */
	public function options($url) {}
	/**
	 * @route("/getActivated", "methods"=>["get"])
	 */
	public function getActivated() {
		parent::getOne(1, true);
    }
    /**
     * @route("/updateActivatedPaypal/{paypalId}", "methods"=>["patch"])
    */
    public function updateActivatedPaypal($paypalId){
		//$datas = $this->getDatas();
		//$paypalId = ($datas['active'] ?? 0);
		$paypal = DAO::getById(\models\PaypalAdmin::class, $paypalId);
		if($paypal != null){
			$activatedPaypal = DAO::getById(\models\ActivatedPaypal::class, 1);
			$activatedPaypal->setActivePaypal($paypal);
	
			DAO::save($activatedPaypal);
			echo $this->_getResponseFormatter()->format(["status" => "updated"]);
		}else{
			echo $this->_getResponseFormatter()->format(["status" => "not_updated", "title" => "paypal account not found"]);
		}

    }
}
