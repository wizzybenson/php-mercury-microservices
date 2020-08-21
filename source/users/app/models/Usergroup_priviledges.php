<?php
namespace models;
/**
 * @table('usergroup_priviledges')
*/
class Usergroup_priviledges{
	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Priviledges","name"=>"idPriv","nullable"=>false)
	**/
	private $priviledges;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Usergroupe","name"=>"idGroup","nullable"=>false)
	**/
	private $usergroupe;

	 public function getPriviledges(){
		return $this->priviledges;
	}

	 public function setPriviledges($priviledges){
		$this->priviledges=$priviledges;
	}

	 public function getUsergroupe(){
		return $this->usergroupe;
	}

	 public function setUsergroupe($usergroupe){
		$this->usergroupe=$usergroupe;
	}

	 public function __toString(){
		return "Usergroup_priviledges@".\spl_object_hash($this);
	}

}