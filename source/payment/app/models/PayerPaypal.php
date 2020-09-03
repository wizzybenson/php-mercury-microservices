<?php
namespace models;

use Ubiquity\orm\DAO;

/**
 * @table("name"=>"paypal_payers")
 **/
class PayerPaypal{
    /**
     * @id
     * column("name" => "payerid ", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $payerid;
    /**
     * column("name" => "given_name", "nullable" => false, "dbType" => "varchar(15)")
     **/
    private $given_name;
    /**
     * column("name" => "surname", "nullable" => false, "dbType" => "varchar(15)")
     **/
    private $surname;
    /**
     * column("name" => "email_address", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $email_address;
    /**
     * column("name" => "payer_id", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $payer_id;
    /**
     * column("name" => "country_code", "nullable" => false, "dbType" => "varchar(6)")
     **/
    private $country_code;

    public function __construct(){}

    public function getPayerid(){ return $this->payerid; }
    public function setPayerid($payerid){ $this->payerid = $payerid; }

    public function getGiven_name(){ return $this->given_name; }
    public function setGiven_name($given_name){ $this->given_name = $given_name; }

    public function getSurname(){ return $this->surname; }
    public function setSurname($surname){ $this->surname = $surname; }

    public function getEmail_address(){ return $this->email_address; }
    public function setEmail_address($email_address){ $this->email_address = $email_address; }

    public function getPayer_id(){ return $this->payer_id; }
    public function setPayer_id($payer_id){ $this->payer_id = $payer_id; }

    public function getCountry_code(){ return $this->country_code; }
    public function setCountry_code($country_code){ $this->country_code = $country_code; }

    public static function addPaypalPayer($paypalPayer){
		$result = DAO::insert($paypalPayer);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert paypal payer");
		}
		return $paypalPayer;
	}
}
