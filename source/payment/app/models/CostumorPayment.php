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
     * column("name" => "transactionmethod", "nullable" => false, "dbType" => "int(2)")
     **/
    private $transactionmethod;
    /**
     * column("name" => "costumorid", "nullable" => false, "dbType" => "int(11)")
     **/
    private $costumorid;
    /**
     * column("name" => "amount", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $amount;
    /**
     * column("name" => "tax_total", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $tax_total;
    /**
     * column("name" => "currencycode", "nullable" => false, "dbType" => "varchar(10)")
     **/
    private $currencycode;
    /**
     * column("name" => "transactioncode", "nullable" => false, "dbType" => "int(11)")
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

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Shipping","name"=>"shippingid","nullable"=>false)
     **/
    private $shipping;

    /**
    * @oneToMany("mappedBy"=>"payment_transaction","className"=>"models\\Refund")
    **/
    private $refunds;
    /**
     * column("name" => "payment_status", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $payment_status;
    /**
     * column("name" => "status", "nullable" => false, "dbType" => "int(2)")
     * @validator("isBool")
     **/
    private $status;

    public function __construct(){}

    public function getTransactionid(){ return $this->transactionid; }
    public function setTransactionid($transactionid){ $this->transactionid = $transactionid; }
    
    public function getTransactionmethod(){ return $this->transactionmethod; }
    public function setTransactionmethod($transactionmethod){ $this->transactionmethod = $transactionmethod; }

    public function getCostumorid(){ return $this->costumorid; }
    public function setCostumorid($costumorid){ $this->costumorid = $costumorid; }

    public function getAmount(){ return $this->amount; }
    public function setAmount($amount){ $this->amount = $amount; }

    public function getTax_total(){ return $this->tax_total; }
    public function setTax_total($tax_total){ $this->tax_total = $tax_total; }

    public function getCurrencycode(){ return $this->currencycode; }
    public function setCurrencycode($currencycode){ $this->currencycode = $currencycode; }

    public function getTransactioncode(){ return $this->transactioncode; }
    public function setTransactioncode($transactioncode){ $this->transactioncode = $transactioncode; }

    public function getTransactiondate(){ return $this->transactiondate; }
    public function setTransactiondate($transactiondate){ $this->transactiondate = $transactiondate; }

    public function getPayment(){ return $this->payment; }
    public function setPayment($paymentmethod){ $this->payment = $paymentmethod; }

    public function getPaymenttransaction(){ return $this->paymenttransaction; }
    public function setPaymenttransaction($paymenttransaction){ $this->paymenttransaction = $paymenttransaction; }

    public function getShipping(){ return $this->shipping; }
    public function setShipping($shipping){ $this->shipping = $shipping; }

    public function getRefunds(){ return $this->refunds; }
    public function setRefunds($refunds){ $this->refunds = $refunds; }

    public function getPayment_status(){ return $this->payment_status; }
    public function setPayment_status($payment_status){ $this->payment_status = $payment_status; }

    public function getStatus(){ return $this->status; }
    public function setStatus($status){ $this->status = $status; }
}
?>
