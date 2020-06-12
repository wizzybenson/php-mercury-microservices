<?php
namespace models;
/**
 * @table('refund')
*/
class Refund{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"refund_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $refund_id;

	/**
	 * @column("name"=>"reason","nullable"=>false,"dbType"=>"text")
	 * @validator("notNull")
	**/
	private $reason;

	/**
	 * @column("name"=>"status","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $status;

	/**
	 * @column("name"=>"discussion","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $discussion;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getRefund_id(){
		return $this->refund_id;
	}

	 public function setRefund_id($refund_id){
		$this->refund_id=$refund_id;
	}

	 public function getReason(){
		return $this->reason;
	}

	 public function setReason($reason){
		$this->reason=$reason;
	}

	 public function getStatus(){
		return $this->status;
	}

	 public function setStatus($status){
		$this->status=$status;
	}

	 public function getDiscussion(){
		return $this->discussion;
	}

	 public function setDiscussion($discussion){
		$this->discussion=$discussion;
	}

	 public function __toString(){
		return ($this->discussion??'no value').'';
	}

}