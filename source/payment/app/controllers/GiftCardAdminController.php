<?php
namespace controllers;

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
     */
    public function getAll(){
        parent::get();
    }
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
}
