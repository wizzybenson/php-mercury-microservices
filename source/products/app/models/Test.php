<?php
namespace models;
/**
 * @table('test')
*/
class Test{
	/**
	 * @id
	 * @column("name"=>"idtest","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $idtest;

	/**
     * @manyToOne
	 * @joinColumn("className"=>"models\\Products","name"=>"idprod","nullable"=>false)

	**/
	private $idprod;

	 public function getIdtest(){
		return $this->idtest;
	}

	 public function setIdtest($idtest){
		$this->idtest=$idtest;
	}

	 public function getIdprod(){
		return $this->idprod;
	}

	 public function setIdprod($idprod){
		$this->idprod=$idprod;
	}

	 public function __toString(){
		return ($this->idprod??'no value').'';
	}

}