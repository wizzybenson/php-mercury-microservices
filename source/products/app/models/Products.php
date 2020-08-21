<?php
namespace models;
/**
 * @table('products')
*/
class Products{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"lib","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $lib;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getLib(){
		return $this->lib;
	}

	 public function setLib($lib){
		$this->lib=$lib;
	}

	 public function __toString(){
		return ($this->lib??'no value').'';
	}

}