<?php
namespace models;

/**
 * @table("name"=>"activated_paypal")
 **/
class ActivatedPaypal{
    /**
     * @id
     * column("name" => "id", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $id;
    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\PaypalAdmin","name"=>"active","nullable"=>false)
     **/
    private $activePaypal;

    public function __construct(){}

    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id; }
    
    public function getActivePaypal(){ return $this->activePaypal; }
    public function setActivePaypal($activePaypal){ $this->activePaypal = $activePaypal; }
}
?>
