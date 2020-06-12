<?php
namespace models;
/**
 * @table('cart')
*/
class Cart{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"cart_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $cart_id;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getCart_id(){
		return $this->cart_id;
	}

	 public function setCart_id($cart_id){
		$this->cart_id=$cart_id;
	}

	 public function __toString(){
		return ($this->cart_id??'no value').'';
	}

}