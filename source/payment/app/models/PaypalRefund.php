<?php
namespace models;

use Ubiquity\orm\DAO;

/**
 * @table("name"=>"paypal_refunds")
 **/
class PaypalRefund{
    /**
     * @id
     * column("name" => "paypalrefundid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $paypalrefundid;
    /**
     * column("name" => "capturedpaypalrefundid", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $capturedpaypalrefundid;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\PaypalAdmin","name"=>"paypal_id","nullable"=>false)
     **/
    private $paypal_account;

    public function __construct(){}

    public function getPaypalrefundid(){ return $this->paypalrefundid; }
    public function setPaypalrefundid($paypalrefundid){ $this->paypalrefundid = $paypalrefundid; }

    public function getCapturedpaypalrefundid(){ return $this->capturedpaypalrefundid; }
    public function setCapturedpaypalrefundid($capturedpaypalrefundid){ $this->capturedpaypalrefundid = $capturedpaypalrefundid; }
    
    public function getPaypal_account(){ return $this->paypal_account; }
    public function setPaypal_account($paypal_account){ $this->paypal_account = $paypal_account; }

	public static function addPaypalRefund($paypalRefund){
		$result = DAO::insert($paypalRefund);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert paypal refund");
		}
		return $paypalRefund;
	}
}

