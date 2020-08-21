<?php
namespace controllers;

/**
 * Rest Controller GiftCardTransactionController
 * @route("/payments/gift_card_transactions","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\GiftCardTransaction")
 */
class GiftCardTransactionController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getOne/{id}", "methods"=>["get"])
     */
    public function getGiftCardTransaction($id){
        $this->_getOne($id, true);
    }
}
