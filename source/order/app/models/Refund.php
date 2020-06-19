<?php
namespace models;
/**
 * @table('refund')
*/
class Refund{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

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

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Order","name"=>"id_order","nullable"=>false)
	**/
	private $order;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
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

	 public function getOrder(){
		return $this->order;
	}

	 public function setOrder($order){
		$this->order=$order;
	}

	 public function __toString(){
		return ($this->discussion??'no value').'';
	}

}