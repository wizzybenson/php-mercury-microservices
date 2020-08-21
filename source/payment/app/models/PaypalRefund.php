<?php
namespace models;
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

    public function __construct(){}

    public function getPaypalrefundid(){ return $this->paypalrefundid; }
    public function setPaypalrefundid($paypalrefundid){ $this->paypalrefundid = $paypalrefundid; }

    public function getCapturedpaypalrefundid(){ return $this->capturedpaypalrefundid; }
    public function setCapturedpaypalrefundid($capturedpaypalrefundid){ $this->capturedpaypalrefundid = $capturedpaypalrefundid; }
}

