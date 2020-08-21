<?php
namespace models;

class Catalog{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"libelle","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $libelle;

	/**
	 * @column("name"=>"details","nullable"=>false,"dbType"=>"varchar(150)")
	 * @validator("length","constraints"=>array("max"=>150,"notNull"=>true))
	**/
	private $details;

	/**
	 * @column("name"=>"image","nullable"=>false,"dbType"=>"varchar(20)")
	 * @validator("length","constraints"=>array("max"=>20,"notNull"=>true))
	**/
	private $image;

	/**
	 * @column("name"=>"datec","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $datec;

	/**
	 * @oneToMany("mappedBy"=>"catalog","className"=>"models\\CatalogProduct")
	**/
	private $catalogProducts;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getLibelle(){
		return $this->libelle;
	}

	 public function setLibelle($libelle){
		$this->libelle=$libelle;
	}

	 public function getDetails(){
		return $this->details;
	}

	 public function setDetails($details){
		$this->details=$details;
	}

	 public function getImage(){
		return $this->image;
	}

	 public function setImage($image){
		$this->image=$image;
	}

	 public function getDatec(){
		return $this->datec;
	}

	 public function setDatec($datec){
		$this->datec=$datec;
	}

	 public function getCatalogProducts(){
		return $this->catalogProducts;
	}

	 public function setCatalogProducts($catalogProducts){
		$this->catalogProducts=$catalogProducts;
	}




  public function validate($libelle){
      return ($libelle);
        }


}