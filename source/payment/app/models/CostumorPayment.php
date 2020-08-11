<?php
namespace models;
/**
 * @table("name"=>"costumors_payments")
 **/
class CostumorPayment{
    /**
     * @id
     * column("name" => "transactionid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $transactionid;
    /**
     * column("name" => "costumorid", "nullable" => false, "dbType" => "int(11)")
     * @validator("notEmpty")
     **/
    private $costumorid;
    /**
     * column("name" => "amount", "nullable" => false, "dbType" => "int(11)")
     * @validator("notEmpty")
     **/
    private $amount;
    /**
     * column("name" => "transactioncode", "nullable" => false, "dbType" => "int(11)")
     * @validator("notEmpty")
     **/
    private $transactioncode;
    /**
     * column("name" => "transactiondate", "nullable" => false, "dbType" => "datetime")
     **/
    private $transactiondate;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Payment","name"=>"paymentmethod","nullable"=>false)
     **/
    private $payment;

    /**
     * column("name" => "paymenttransaction", "nullable" => false, "dbType" => "int(11)")
     * @validator("notEmpty")
     **/
    private $paymenttransaction;

    public function __construct(){}

    public function getTransactionid(){ return $this->transactionid; }
    public function setTransactionid($transactionid){ $this->transactionid = $transactionid; }
    
    public function getCostumorid(){ return $this->costumorid; }
    public function setCostumorid($costumorid){ $this->costumorid = $costumorid; }

    public function getAmount(){ return $this->amount; }
    public function setAmount($amount){ $this->amount = $amount; }

    public function getTransactioncode(){ return $this->transactioncode; }
    public function setTransactioncode($transactioncode){ $this->transactioncode = $transactioncode; }

    public function getTransactiondate(){ return $this->transactiondate; }
    public function setTransactiondate($transactiondate){ $this->transactiondate = $transactiondate; }

    public function getPayment(){ return $this->payment; }
    public function setPayment($paymentmethod){ $this->payment = $paymentmethod; }

    public function getPaymenttransaction(){ return $this->paymenttransaction; }
    public function setPaymenttransaction($paymenttransaction){ $this->paymenttransaction = $paymenttransaction; }
}
?>
