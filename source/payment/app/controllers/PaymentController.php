<?php
namespace controllers;

<<<<<<< HEAD
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
=======
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
>>>>>>> upstream/master
     */
    public function getAll(){
        parent::get();
    }
    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> upstream/master
    }
}
