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
     * @manyToOne
     * @joinColumn("className"=>"models\\GiftCardAdmin","name"=>"giftcardid","nullable"=>false)
     **/
    private $giftcard;

    public function __construct(){}

    public function getGiftcardtransactionid(){ return $this->giftcardtransactionid; }
    public function setGiftcardtransactionid($giftcardtransactionid){ $this->giftcardtransactionid = $giftcardtransactionid; }
    
    public function getGiftcard(){ return $this->giftcard; }
    public function setGiftcard($giftcard){ $this->giftcard = $giftcard; }
}
?>
