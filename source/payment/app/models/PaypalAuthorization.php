<?php
namespace models;
/**
 * @table("name"=>"paypal_authorizations")
 **/
class PaypalAuthorization{
    /**
     * @id
     * column("name" => "authorizationid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $authorizationid;
    /**
     * column("name" => "authorized_paypal_id", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $authorized_paypal_id;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\PaypalAdmin","name"=>"paypal_id","nullable"=>false)
     **/
    private $paypal_account;

    public function __construct(){}

    public function getAuthorizationid(){ return $this->authorizationid; }
    public function setAuthorizationid($authorizationid){ $this->authorizationid = $authorizationid; }

    public function getAuthorized_paypal_id(){ return $this->authorized_paypal_id; }
    public function setAuthorized_paypal_id($authorized_paypal_id){ $this->authorized_paypal_id = $authorized_paypal_id; }
    
    public function getPaypal_account(){ return $this->paypal_account; }
    public function setPaypal_account($paypal_account){ $this->paypal_account = $paypal_account; }
}

