<?php
namespace controllers;

<<<<<<< HEAD
use models\GiftCardAdmin;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
/**
 * Rest Controller GiftCardAdminController
 * @route("/payment/giftCardAdmin","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\GiftCardAdmin")
 */
class GiftCardAdminController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("methods"=>["get"])
=======
/**
 * Rest Controller GiftCardAdminController
 * @route("/payments/giftcards","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\GiftCardAdmin")
 */
class GiftCardAdminController extends \Ubiquity\controllers\rest\RestController {
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
    public function addGiftCard(){
        $giftCard = new GiftCardAdmin();
        URequest::setPostValuesToObject($giftCard);
        if(DAO::insert($giftCard)){
            echo $this->_getResponseFormatter()->getOne($giftCard);
        }else{
            echo "Error : gift card not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updateGiftCard(){
        $values = URequest::getInput();
        $giftCard = DAO::getOne($this->model, $values['giftcardid']);
        if($giftCard != null){
            URequest::setValuesToObject($giftCard, $values);
            if(DAO::update($giftCard)){
                echo $this->_getResponseFormatter()->getOne($giftCard);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : giftCard not Found!";
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
     * @route("/addGiftCard", "methods"=>["post"])
     */
    public function addGiftCard(){
        $this->_add();
    }
    /**
     * @route("/updateGiftCard/{keyValues}", "methods"=>["patch"])
     * @param array $keyValues
    */
    public function updateGiftCard(...$keyValues){
        $this->_update(...$keyValues);
    }
	/**
	 * Delete the instance of $model selected by the primary key $keyValues
	 * Requires an authorization with access token
	 *
	 * @param array $keyValues
	 * @route("/deleteGiftCard/{keyValues}", "methods"=>["delete"],"priority"=>30)
	 */
	public function deleteGiftCard(...$keyValues) {
		$this->_delete ( ...$keyValues );
	}
>>>>>>> upstream/master
}
