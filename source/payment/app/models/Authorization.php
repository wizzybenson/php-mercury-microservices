<?php
namespace models;
/**
 * @table("name"=>"authorizations")
 **/
class Authorization{
    /**
     * @id
     * column("name" => "authorization_id", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $authorization_id;
    /**
     * column("name" => "createtime", "nullable" => true, "dbType" => "datetime")
     **/
    private $createtime;
    /**
     * column("name" => "expiration_date", "nullable" => true, "dbType" => "datetime")
     **/
    private $expiration_date;
    /**
     * column("name" => "capture_date", "nullable" => true, "dbType" => "datetime")
     **/
    private $capture_date;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Payment","name"=>"paymentmethod","nullable"=>false)
     **/
    private $payment;
    /**
     * column("name" => "authorization_transaction", "nullable" => true, "dbType" => "int(11)")
     **/
    private $authorization_transaction;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\CostumorPayment","name"=>"payment_transaction_id","nullable"=>false)
     **/
    private $payment_transaction;
    /**
     * column("name" => "status", "nullable" => true, "dbType" => "int(2)")
     * @validator("isBool")
     **/
    private $status;

    public function __construct(){}

    public function getAuthorization_id(){ return $this->authorization_id; }
    public function setAuthorization_id($authorization_id){ $this->authorization_id = $authorization_id; }

    public function getCreatetime(){ return $this->createtime; }
    public function setCreatetime($createtime){ $this->createtime = $createtime; }

    public function getExpiration_date(){ return $this->expiration_date; }
    public function setExpiration_date($expiration_date){ $this->expiration_date = $expiration_date; }

    public function getCapture_date(){ return $this->capture_date; }
    public function setCapture_date($capture_date){ $this->capture_date = $capture_date; }

    public function getPayment(){ return $this->payment; }
    public function setPayment($payment){ $this->payment = $payment; }

    public function getAuthorization_transaction(){ return $this->authorization_transaction; }
    public function setAuthorization_transaction($authorization_transaction){ $this->authorization_transaction = $authorization_transaction; }

    public function getPayment_transaction(){ return $this->payment_transaction; }
    public function setPayment_transaction($payment_transaction){ $this->payment_transaction = $payment_transaction; }

    public function getStatus(){ return $this->status; }
    public function setStatus($status){ $this->status = $status; }
}
