<?php
namespace models;
/**
 * @table("name"=>"paypal_transactions")
 **/
class PaypalTransaction{
    /**
     * @id
     * column("name" => "paypaltransactionid ", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $paypaltransactionid;
    /**
     * column("name" => "captureid", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $captureid;

    /**
     * column("name" => "paymentcaptureid", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $paymentcaptureid;
    
    /**
     * column("name" => "currencycode", "nullable" => false, "dbType" => "varchar(10)")
     **/
    private $currencycode;

    /**
     * column("name" => "amountvalue", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $amountvalue;

    /**
     * column("name" => "paypalfee", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $paypalfee;

    /**
     * column("name" => "createtime", "nullable" => false, "dbType" => "datetime")
     **/
    private $createtime;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\PaypalAdmin","name"=>"paypal_id","nullable"=>false)
     **/
    private $paypal_account;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\PayerPaypal","name"=>"payerid","nullable"=>false)
     **/
    private $payer;

    public function __construct(){}
    public function getPaypaltransactionid(){ return $this->paypaltransactionid; }
    public function setPaypaltransactionid($paypaltransactionid){ $this->paypaltransactionid = $paypaltransactionid; }

    public function getCaptureid(){ return $this->captureid; }
    public function setCaptureid($captureid){ $this->captureid = $captureid; }

    public function getPaymentcaptureid(){ return $this->paymentcaptureid; }
    public function setPaymentcaptureid($paymentcaptureid){ $this->paymentcaptureid = $paymentcaptureid; }

    public function getCurrencycode(){ return $this->currencycode; }
    public function setCurrencycode($currencycode){ $this->currencycode = $currencycode; }

    public function getAmountvalue(){ return $this->amountvalue; }
    public function setAmountvalue($amountvalue){ $this->amountvalue = $amountvalue; }

    public function getPaypalfee(){ return $this->paypalfee; }
    public function setPaypalfee($paypalfee){ $this->paypalfee = $paypalfee; }

    public function getCreatetime(){ return $this->createtime; }
    public function setCreatetime($createtime){ $this->createtime = $createtime; }

    public function getPaypal_account(){ return $this->paypal_account; }
    public function setPaypal_account($paypal_account){ $this->paypal_account = $paypal_account; }

    public function getPayer(){ return $this->payer; }
    public function setPayer($payer){ $this->payer = $payer; }

}
?>
