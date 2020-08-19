<?php
namespace controllers;

/**
 * Rest Controller PaypalTransactionController
 * @route("/payments/paypal_transactions","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\PaypalTransaction")
 */
class PaypalTransactionController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getOne/{id}", "methods"=>["get"])
     */
    public function getPaypalTransaction($id){
        $this->_getOne($id, true);
    }
}
