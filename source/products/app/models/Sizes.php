<?php
namespace models;
/**
 * @table('sizes')
*/
class Sizes{
	/**
	 * @id
	 * @column("name"=>"idsize","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	// hete
	private $idsize;

	/**
	 * @column("name"=>"sizename","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $sizename;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Products","name"=>"product_id","nullable"=>false)

     **/
	private $product_id;

	 public function getIdsize(){
		return $this->idsize;
	}

	 public function setIdsize($idsize){
		$this->idsize=$idsize;
	}

	 public function getSizename(){
		return $this->sizename;
	}

	 public function setSizename($sizename){
		$this->sizename=$sizename;
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
        return DAO::delete(Sizes::class,$id);
    }

}