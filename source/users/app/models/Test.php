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
	 * @joinColumn("className"=>"models\\User","name"=>"iduser","nullable"=>false)
	**/
	private $user;

	 public function getIdtest(){
		return $this->idtest;
	}

	 public function setIdtest($idtest){
		$this->idtest=$idtest;
	}

	 public function getUser(){
		return $this->user;
	}

	 public function setUser($user){
		$this->user=$user;
	}

	 public function __toString(){
		return $this->idtest.'';
	}

}