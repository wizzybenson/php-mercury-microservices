<?php

namespace controllers;

<<<<<<< HEAD
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
=======
/**
 * Rest Controller PaypalAdminController
 * @route("/payments/paypalAdmin","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\PaypalAdmin")
 */
class PaypalAdminController extends \Ubiquity\controllers\rest\RestController{
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
<<<<<<< HEAD

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
=======
	/**
	 * Get the first object corresponding to the $keyValues
	 *
	 * @param string $keyValues primary key(s) value(s) or condition
	 * @param boolean|string $included if true, loads associate members with associations, if string, example : client.*,commands
	 * @param boolean $useCache if true then response is cached
	 * @route("/getOne/{keyValues}", "methods"=>["get"])
	 */
	public function getOne($keyValues, $included = false, $useCache = false) {
		parent::getOne($keyValues, $included, $useCache);
	}
    /**
     * @route("/addPaypal", "methods"=>["post"])
     */
    public function addPaypal(){
        $this->_add();
    }
    /**
     * @route("/updatePaypal/{keyValues}", "methods"=>["patch"])
     * @param array $keyValues
    */
    public function updatePaypal(...$keyValues){
        $this->_update(...$keyValues);
    }
	/**
	 * Delete the instance of $model selected by the primary key $keyValues
	 * Requires an authorization with access token
	 *
	 * @param array $keyValues
	 * @route("/deletePaypal/{keyValues}", "methods"=>["delete"],"priority"=>30)
	 */
	public function deletePaypal(...$keyValues) {
		$this->_delete ( ...$keyValues );
	}
>>>>>>> upstream/master
}
