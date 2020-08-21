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

	/**
	 * @column("name"=>"price","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $price;

	/**
	 * @column("name"=>"img","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $img;

	/**
	 * @column("name"=>"description","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $description;

	/**
	 * @column("name"=>"producttype","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $producttype;

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

	 public function getPrice(){
		return $this->price;
	}

	 public function setPrice($price){
		$this->price=$price;
	}

	 public function getImg(){
		return $this->img;
	}

	 public function setImg($img){
		$this->img=$img;
	}

	 public function getDescription(){
		return $this->description;
	}

	 public function setDescription($description){
		$this->description=$description;
	}

	 public function getProducttype(){
		return $this->producttype;
	}

	 public function setProducttype($producttype){
		$this->producttype=$producttype;
	}

	 public function __toString(){
		return ($this->producttype??'no value').'';
	}

    public static function delete($id){
        return DAO::delete(Products::class,$id);
    }

}