<?php
namespace models;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
class CatalogProduct extends \Ubiquity\controllers\rest\RestController{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"catalog","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Catalog","name"=>"catalog","nullable"=>false)
	**/
	private $catalog;

	/**
	 * @column("name"=>"product","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Product","name"=>"product","nullable"=>false)
	**/
	private $product;

	/**
	 * @column("name"=>"datecp","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $datecp;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getCatalog(){
		return $this->catalog;
	}

	 public function setCatalog($catalog){
		$this->catalog=$catalog;
	}

	 public function getProduct(){
		return $this->product;
	}

	 public function setProduct($product){
		$this->product=$product;
	}

	 public function getDatecp(){
		return $this->datecp;
	}

	 public function setDatecp($datecp){
		$this->datecp=$datecp;
	}

	 public function __toString(){
		return ($this->datecp??'no value').'';
	}

    /*public function AddProductToCatalog(){
        $this->model= new CatalogProduct();
        $this->add();

    }*/
}