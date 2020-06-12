<?php
namespace models;
/**
 * @table('payment')
*/
class Payment{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"payment_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $payment_id;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getPayment_id(){
		return $this->payment_id;
	}

	 public function setPayment_id($payment_id){
		$this->payment_id=$payment_id;
	}

	 public function __toString(){
		return ($this->payment_id??'no value').'';
	}

}