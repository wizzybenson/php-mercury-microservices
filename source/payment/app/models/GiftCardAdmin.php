<?php
namespace models;
/**
 * @table("name"=>"gift_card_admin")
 **/
class GiftCardAdmin{
    /**
     * @id
     * column("name" => "giftcardid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $giftcardid;
    /**
     * column("name" => "title", "nullable" => false, "dbType" => "varchar(100)")
     * @validator("notEmpty")
     **/
    private $title;
    /**
     * column("name" => "code", "nullable" => false, "dbType" => "varchar(100)")
     * @validator("notEmpty")
     **/
    private $code;
    /**
     * column("name" => "description", "nullable" => true, "dbType" => "varchar(255)")
     **/
    private $description;
    /**
     * column("name" => "ladate", "nullable" => true, "dbType" => "datetime")
     **/
    private $ladate;
    /**
     * column("name" => "expiration_date", "nullable" => false, "dbType" => "datetime")
     **/
    private $expiration_date;
    /**
     * column("name" => "max_use", "nullable" => false, "dbType" => "int(10)")
     * @validator("notEmpty")
     **/
    private $max_use;
    /**
     * column("name" => "used", "nullable" => true, "dbType" => "int(10)")
     **/
    private $used;
    /**
     * column("name" => "status", "nullable" => false, "dbType" => "int(2)")
     * @validator("isBool")
     **/
    private $status;

    public function __construct(){}
    public function getGiftcardid(){ return $this->giftcardid; }
    public function setGiftcardid($giftcardid){ $this->giftcardid = $giftcardid; }

    public function getTitle(){ return $this->title; }
    public function setTitle($title){ $this->title = $title; }

    public function getCode(){ return $this->code; }
    public function setCode($code){ $this->code = $code; }

    public function getDescription(){ return $this->description; }
    public function setDescription($description){ $this->description = $description; }

    public function getLadate(){ return $this->ladate; }
    public function setLadate($ladate){ $this->ladate = $ladate; }

    public function getExpiration_date(){ return $this->expiration_date; }
    public function setExpiration_date($expiration_date){ $this->expiration_date = $expiration_date; }

    public function getMax_use(){ return $this->max_use; }
    public function setMax_use($max_use){ $this->max_use = $max_use; }

    public function getUsed(){ return $this->used; }
    public function setUsed($used){ $this->used = $used; }

    public function getStatus(){ return $this->status; }
    public function setStatus($status){ $this->status = $status; }

}
?>
