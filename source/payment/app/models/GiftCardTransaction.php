<?php
namespace models;

use Ubiquity\orm\DAO;

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

	public static function addGiftCardTransaction($giftCardTransaction){
		$result = DAO::insert($giftCardTransaction);
		if($result){
            // add +1 to used in gift Cards
            $giftCard = $giftCardTransaction->getGiftcard();
			$giftCard->setUsed($giftCard->getUsed()+1);
			$result = DAO::update($giftCard);
			if(!$result){
				throw new \Exception("Unable to update the instance gift Card");
            }
            return $giftCardTransaction;
		}
		throw new \Exception("Unable to insert the instance giftCardTransaction");
	}
}
?>
