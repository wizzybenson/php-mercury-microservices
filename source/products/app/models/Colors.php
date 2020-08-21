<?php
namespace models;
/**
 * @table('colors')
*/
class Colors{
	/**
	 * @id
	 * @column("name"=>"idcolor","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	// here idcolor attibute
	private $idcolor;

	/**
	 * @column("name"=>"colorname","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $colorname;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Products","name"=>"product_id","nullable"=>false)

     **/

	private $product_id;

	 public function getIdcolor(){
		return $this->idcolor;
	}

	 public function setIdcolor($idcolor){
		$this->idcolor=$idcolor;
	}

	 public function getColorname(){
		return $this->colorname;
	}

	 public function setColorname($colorname){
		$this->colorname=$colorname;
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
        return DAO::delete(Colors::class,$id);
    }

}