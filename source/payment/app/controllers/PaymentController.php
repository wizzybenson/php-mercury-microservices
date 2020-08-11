<?php
namespace controllers;

/**
 * Rest Controller PaymentController
 * @route("/payments/payments","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\Payment")
 */
class PaymentController extends \Ubiquity\controllers\rest\RestController {
	/**
	 * @options("/{url}")
	 */
    public function options($url) {}
    /**
     * @route("/getAll", "methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("/getPayment/{id}", "methods"=>["get"])
     */
    public function getPayment($id){
        parent::getOne($id);
    }
    /**
     * @route("/getActivatedPayments", "methods"=>["get"])
     */
    public function getActivatedPayments(){
        parent::get("status=1");
    }
    /**
     * @route("/updatePayment/{keyValues}", "methods"=>["patch"])
     * @param array $keyValues
    */
    public function updatePayment(...$keyValues){
        $this->_update(...$keyValues);
    }
}
