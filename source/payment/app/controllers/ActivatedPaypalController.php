<?php
namespace controllers;
/**
 * Rest Controller ActivatedPaypalController
 * @route("/payments/activated_paypal","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\ActivatedPaypal")
 */
class ActivatedPaypalController extends \Ubiquity\controllers\rest\RestController {
	
	/**
	 * @route("/getActivated", "methods"=>["get"])
	 */
	public function getActivated() {
		parent::getOne(1, true);
    }
    /**
     * @route("/updateAcivePaypal/{keyValues}", "methods"=>["patch"])
     * @param array $keyValues
    */
    public function updateAcivePaypal(...$keyValues){
        $this->_update(...$keyValues);
    }
}
