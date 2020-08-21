<?php
namespace models;
/**
 * @table('usergroup_users')
*/
class Usergroup_users{
	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\User","name"=>"idUser","nullable"=>false)
	**/
	private $user;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Usergroupe","name"=>"idGroup","nullable"=>false)
	**/
	private $usergroupe;

	 public function getUser(){
		return $this->user;
	}

	 public function setUser($user){
		$this->user=$user;
	}

	 public function getUsergroupe(){
		return $this->usergroupe;
	}

	 public function setUsergroupe($usergroupe){
		$this->usergroupe=$usergroupe;
	}

	 public function __toString(){
		return "Usergroup_users@".\spl_object_hash($this);
	}

}