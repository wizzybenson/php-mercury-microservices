<?php
namespace models;
/**
 * @table('priviledges')
*/
class Priviledges{
	/**
	 * @id
	 * @column("name"=>"idPriv","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $idPriv;

	/**
	 * @column("name"=>"nomPriv","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	private $nomPriv;




    public function getIdPriv(){
		return $this->idPriv;
	}

	 public function setIdPriv($idPriv){
		$this->idPriv=$idPriv;
	}

	 public function getNomPriv(){
		return $this->nomPriv;
	}

	 public function setNomPriv($nomPriv){
		$this->nomPriv=$nomPriv;
	}


}