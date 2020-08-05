<?php

namespace controllers;

use Ubiquity\orm\DAO;
use Models\Paypal;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller PaypalController
 * @route("/payment/paypal","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Paypal")
 */
class PaypalController extends \Ubiquity\controllers\rest\RestController{

    /**
     * @route("methods"=>["get"])
     */
    public function getActivatedAccount(){
        $data = DAO::getOne($this->model, 1);
        echo $this->_getResponseFormatter()->getOne($data);
    }

    /**
     * @route("methods"=>["patch"])
     */
    public function updateActivatedAccount(){
        $values = URequest::getInput();
        $paypal = DAO::getOne($this->model, 1);
        //echo $values['activated_compte'];
        URequest::setValuesToObject($paypal, $values);
        DAO::update($paypal);
        echo $this->_getResponseFormatter()->getOne($paypal);
    }
}