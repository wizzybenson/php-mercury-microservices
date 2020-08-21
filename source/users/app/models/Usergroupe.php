<?php
namespace models;
/**
 * @table('usergroupe')
*/
class Usergroupe{
	/**
	 * @id
	 * @column("name"=>"idGroup","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $idGroup;

	/**
	 * @column("name"=>"nomGroup","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	private $nomGroup;

	/**
	 * @column("name"=>"capacity","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $capacity;



    public function getIdGroup(){
		return $this->idGroup;
	}

	 public function setIdGroup($idGroup){
		$this->idGroup=$idGroup;
	}

	 public function getNomGroup(){
		return $this->nomGroup;
	}

	 public function setNomGroup($nomGroup){
		$this->nomGroup=$nomGroup;
	}

	 public function getCapacity(){
		return $this->capacity;
	}

	 public function setCapacity($capacity){
		$this->capacity=$capacity;
	}


}