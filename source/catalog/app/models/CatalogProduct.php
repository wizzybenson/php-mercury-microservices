<?php
namespace models;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
class CatalogProduct{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"catalog","nullable"=>false,"dbType"=>"int")
	 * @validator("notNull")
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Catalog","name"=>"catalog","nullable"=>false)
	**/
	private $catalog;

	/**
	 * @column("name"=>"product","nullable"=>false,"dbType"=>"int")
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


    public function add($cat){

        $cp = new CatalogProduct();
        $cp->setId(100);
        $cp->setCatalog(1);
        $cp->setProduct(2);
        $cp->setDatecp("2020-06-12 11:45:20");
        echo "mehdi".$cp->getCatalog()."--";
        if(DAO::save($cp))
        {
            echo true;
        }else{
            echo false;
        }

    }
    public function addprotoCatalog(){
        if(DAO::insert($this))
            return true;
        else
            return false;
    }
}