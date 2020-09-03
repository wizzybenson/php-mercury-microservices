<?php
namespace models;

use Ubiquity\orm\DAO;

/**
 * @table("name"=>"refunds")
 **/
class Refund{
    /**
     * @id
     * column("name" => "refundid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $refundid;
    /**
     * column("name" => "amount", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $amount;
    /**
     * column("name" => "currencycode", "nullable" => false, "dbType" => "varchar(10)")
     **/
    private $currencycode;
    /**
     * column("name" => "type", "nullable" => false, "dbType" => "int(2)")
     **/
    private $type;
    /**
     * column("name" => "createtime", "nullable" => false, "dbType" => "datetime")
     **/
    private $createtime;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Payment","name"=>"paymentmethod","nullable"=>false)
     **/
    private $payment;

    /**
     * column("name" => "refund_transaction", "nullable" => false, "dbType" => "int(11)")
     **/
    private $refund_transaction;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\CostumorPayment","name"=>"payment_transaction_id","nullable"=>false)
     **/
    private $payment_transaction;

    public function __construct(){}

    public function getRefundid(){ return $this->refundid; }
    public function setRefundid($refundid){ $this->refundid = $refundid; }

    public function getAmount(){ return $this->amount; }
    public function setAmount($amount){ $this->amount = $amount; }

    public function getCurrencycode(){ return $this->currencycode; }
    public function setCurrencycode($currencycode){ $this->currencycode = $currencycode; }

    public function getType(){ return $this->type; }
    public function setType($type){ $this->type = $type; }

    public function getCreatetime(){ return $this->createtime; }
    public function setCreatetime($createtime){ $this->createtime = $createtime; }

    public function getPayment(){ return $this->payment; }
    public function setPayment($payment){ $this->payment = $payment; }

    public function getRefund_transaction(){ return $this->refund_transaction; }
    public function setRefund_transaction($refund_transaction){ $this->refund_transaction = $refund_transaction; }

    public function getPayment_transaction(){ return $this->payment_transaction; }
    public function setPayment_transaction($payment_transaction){ $this->payment_transaction = $payment_transaction; }

	public static function addRefund($refund){
        $result = DAO::insert($refund);
		// very important to check sql transaction
		if(!$result){
			throw new \Exception("Unable to insert refund");
		}
		return $refund;
	}
}
