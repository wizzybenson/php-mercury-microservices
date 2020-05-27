<?php
namespace controllers;

use models\Payment;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller PaymentController
 * @route("/payment/payment","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Payment")
 */
class PaymentController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addPayment(){
        $payment = new Payment();
        URequest::setPostValuesToObject($payment);
        if(DAO::insert($payment)){
            echo $this->_getResponseFormatter()->getOne($payment);
        }else{
            echo "Error : payment not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updatePayment(){
        $values = URequest::getInput();
        $paymentClass = DAO::getOne($this->model, $values['paymentid']);
        if($paymentClass != null){
            URequest::setValuesToObject($paymentClass, $values);
            if(DAO::update($paymentClass)){
                echo $this->_getResponseFormatter()->getOne($paymentClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : payment not Found!";
        }
    }
    /**
     * @route("methods"=>["patch"])
     */
    public function updateStatus(){
        $values = URequest::getInput();
        $paymentClass = DAO::getOne($this->model, $values['paymentid']);
        if($paymentClass != null){
            URequest::setValuesToObject($paymentClass, $values);
            if(DAO::update($paymentClass)){
                echo $this->_getResponseFormatter()->getOne($paymentClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : payment not Found!";
        }
    }
}
