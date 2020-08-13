<?php
namespace models;
/**
 * @table('user')
*/
class User{
	/**
	 * @id
	 * @column("name"=>"idUser","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $idUser;

	/**
	 * @column("name"=>"Login","nullable"=>false,"dbType"=>"varchar(20)")
	 * @validator("length","constraints"=>array("max"=>20,"notNull"=>true))
	**/
	private $Login;

	/**
	 * @column("name"=>"Password","nullable"=>false,"dbType"=>"varchar(20)")
	 * @validator("length","constraints"=>array("max"=>20,"notNull"=>true))
	**/
	private $Password;

	/**
	 * @column("name"=>"merchant_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $merchant_id;

	/**
	 * @column("name"=>"user_type","nullable"=>false,"dbType"=>"varchar(30)")
	 * @validator("length","constraints"=>array("max"=>30,"notNull"=>true))
	**/
	private $user_type;


    public function getIdUser(){
		return $this->idUser;
	}

	 public function setIdUser($idUser){
		$this->idUser=$idUser;
	}

	 public function getLogin(){
		return $this->Login;
	}

	 public function setLogin($Login){
		$this->Login=$Login;
	}

	 public function getPassword(){
		return $this->Password;
	}

	 public function setPassword($Password){
		$this->Password=$Password;
	}

	 public function getMerchant_id(){
		return $this->merchant_id;
	}

	 public function setMerchant_id($merchant_id){
		$this->merchant_id=$merchant_id;
	}

	 public function getUser_type(){
		return $this->user_type;
	}

	 public function setUser_type($user_type){
		$this->user_type=$user_type;
	}


}