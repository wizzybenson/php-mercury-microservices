<?php
namespace models;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
class Product{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"lib","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $lib;

	/**
	 * @oneToMany("mappedBy"=>"product","className"=>"models\\CatalogProduct")
	**/
	private $catalogProducts;

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

	 public function getCatalogProducts(){
		return $this->catalogProducts;
	}

	 public function setCatalogProducts($catalogProducts){
		$this->catalogProducts=$catalogProducts;
	}

	 public function __toString(){
		return ($this->lib??'no value').'';
	}

}