<?php
namespace models;
/**
 * @table('weights')
*/
class Weights{
	/**
	 * @id
	 * @column("name"=>"idweight","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $idweight;

	/**
	 * @column("name"=>"capacite","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $capacite;

	/**
	 * @column("name"=>"weight_unit","nullable"=>false,"dbType"=>"varchar(20)")
	 * @validator("length","constraints"=>array("max"=>20,"notNull"=>true))
	**/
	private $weight_unit;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Products","name"=>"product_id","nullable"=>false)

     **/
	private $product_id;

	 public function getIdweight(){
		return $this->idweight;
	}

	 public function setIdweight($idweight){
		$this->idweight=$idweight;
	}

	 public function getCapacite(){
		return $this->capacite;
	}

	 public function setCapacite($capacite){
		$this->capacite=$capacite;
	}

	 public function getWeight_unit(){
		return $this->weight_unit;
	}

	 public function setWeight_unit($weight_unit){
		$this->weight_unit=$weight_unit;
	}

	 public function getProduct_id(){
		return $this->product_id;
	}

	 public function setProduct_id($product_id){
		$this->product_id=$product_id;
	}

	 public function __toString(){
		return ($this->product_id??'no value').'';
	}


    public static function delete($id){
        return DAO::delete(Weights::class,$id);
    }

}