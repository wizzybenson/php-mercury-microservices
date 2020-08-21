<?php
namespace models;
/**
 * @table('customer')
*/
class Customer{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"username","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $username;

	/**
	 * @column("name"=>"email","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("email","constraints"=>array("notNull"=>true))
	 * @validator("length","constraints"=>array("max"=>255))
	**/
	private $email;

	/**
	 * @oneToMany("mappedBy"=>"customer","className"=>"models\\Cart")
	**/
	private $carts;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getUsername(){
		return $this->username;
	}

	 public function setUsername($username){
		$this->username=$username;
	}

	 public function getEmail(){
		return $this->email;
	}

	 public function setEmail($email){
		$this->email=$email;
	}

	 public function getCarts(){
		return $this->carts;
	}

	 public function setCarts($carts){
		$this->carts=$carts;
	}

	 public function __toString(){
		return ($this->email??'no value').'';
	}

}