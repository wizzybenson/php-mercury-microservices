<?php
namespace models;
/**
 * @table("name"=>"paypal")
 **/
class Paypal{
    /**
     * @id
     * column("name" => "id", "nullable" => false, "dbType" => "int(11)")
     **/
    private $id;

    /**
     * column("name" => "activated_compte", "nullable" => false, "dbType" => "int(11)")
     **/
    private $activated_compte;

    /**
     * Paypal constructor.
     */
    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getActivated_compte()
    {
        return $this->activated_compte;
    }

    /**
     * @param mixed $activated_compte
     */
    public function setActivated_compte($activated_compte): void
    {
        $this->activated_compte = $activated_compte;
    }
}