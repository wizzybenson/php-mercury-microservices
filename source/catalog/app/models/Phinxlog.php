<?php
namespace models;
/**
 * @table('phinxlog')
*/
class Phinxlog{
	/**
	 * @id
	 * @column("name"=>"version","nullable"=>false,"dbType"=>"bigint")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $version;

	/**
	 * @column("name"=>"migration_name","nullable"=>true,"dbType"=>"varchar(100)")
	 * @validator("length","constraints"=>array("max"=>100))
	**/
	private $migration_name;

	/**
	 * @column("name"=>"start_time","nullable"=>true,"dbType"=>"timestamp")
	**/
	private $start_time;

	/**
	 * @column("name"=>"end_time","nullable"=>true,"dbType"=>"timestamp")
	**/
	private $end_time;

	/**
	 * @column("name"=>"breakpoint","nullable"=>false,"dbType"=>"tinyint(1)")
	 * @validator("isBool","constraints"=>array("notNull"=>true))
	**/
	private $breakpoint;

	 public function getVersion(){
		return $this->version;
	}

	 public function setVersion($version){
		$this->version=$version;
	}

	 public function getMigration_name(){
		return $this->migration_name;
	}

	 public function setMigration_name($migration_name){
		$this->migration_name=$migration_name;
	}

	 public function getStart_time(){
		return $this->start_time;
	}

	 public function setStart_time($start_time){
		$this->start_time=$start_time;
	}

	 public function getEnd_time(){
		return $this->end_time;
	}

	 public function setEnd_time($end_time){
		$this->end_time=$end_time;
	}

	 public function getBreakpoint(){
		return $this->breakpoint;
	}

	 public function setBreakpoint($breakpoint){
		$this->breakpoint=$breakpoint;
	}

	 public function __toString(){
		return ($this->breakpoint??'no value').'';
	}

}