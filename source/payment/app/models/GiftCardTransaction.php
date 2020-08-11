<?php
namespace models;
/**
 * @table("name"=>"gift_card_transactions")
 **/
class GiftCardTransaction{
    /**
     * @id
     * column("name" => "giftcardtransactionid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $giftcardtransactionid;
    /**
     * column("name" => "giftcardid", "nullable" => false, "dbType" => "int(11)")
     * @validator("notEmpty")
     **/
    private $giftcardid;

    public function __construct(){}

    public function getGiftcardtransactionid(){ return $this->giftcardtransactionid; }
    public function setGiftcardtransactionid($giftcardtransactionid){ $this->giftcardtransactionid = $giftcardtransactionid; }
    
    public function getGiftcardid(){ return $this->giftcardid; }
    public function setGiftcardid($giftcardid){ $this->giftcardid = $giftcardid; }
}
?>
