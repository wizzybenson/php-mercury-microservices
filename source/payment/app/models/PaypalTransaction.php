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
     * column("name" => "shippingname", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $shippingname;

    /**
     * column("name" => "shippingadress", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $shippingadress;

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
     * column("name" => "payerid", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $payerid;

    /**
     * column("name" => "payeremail", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $payeremail;

    public function __construct(){}
    public function getPaypaltransactionid(){ return $this->paypaltransactionid; }
    public function setPaypaltransactionid($paypaltransactionid){ $this->paypaltransactionid = $paypaltransactionid; }

    public function getCaptureid(){ return $this->captureid; }
    public function setCaptureid($captureid){ $this->captureid = $captureid; }

    public function getShippingname(){ return $this->shippingname; }
    public function setShippingname($shippingname){ $this->shippingname = $shippingname; }

    public function getShippingadress(){ return $this->shippingadress; }
    public function setShippingadress($shippingadress){ $this->shippingadress = $shippingadress; }

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

    public function getPayerid(){ return $this->payerid; }
    public function setPayerid($payerid){ $this->payerid = $payerid; }

    public function getPayeremail(){ return $this->payeremail; }
    public function setPayeremail($payeremail){ $this->payeremail = $payeremail; }

}
?>
