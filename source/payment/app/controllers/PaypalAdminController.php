<?php

namespace controllers;

use models\PaypalAdmin;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller PaypalAdminController
 * @route("/payment/paypalAdmin","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\PaypalAdmin")
 */
class PaypalAdminController extends \Ubiquity\controllers\rest\RestController{
    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }

    /**
     * @route("methods"=>["post"])
     */
    public function addPaypalAccount(){
        $paypal = new PaypalAdmin();
        URequest::setPostValuesToObject($paypal);
        if (DAO::insert($paypal)) {
            echo $this->_getResponseFormatter()->getOne($paypal);
        } else {
            echo "Error : paypal not inserted!";
        }
    }

    /**
     * @route("methods"=>["put"])
     */
    public function updatePaypalAccount(){
        $values = URequest::getInput();
        $paypal_account = DAO::getOne($this->model, $values['paypalid']);
        if ($paypal_account != null) {
            URequest::setValuesToObject($paypal_account, $values);
            if (DAO::update($paypal_account)) {
                echo $this->_getResponseFormatter()->getOne($paypal_account);
            } else {
                echo "Error : data not modified!";
            }
        } else {
            echo "Error : paypal account not Found!";
        }
    }
}
