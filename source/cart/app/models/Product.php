<?php


namespace models;

use Ubiquity\orm\DAO;

/**
 * @table('product')
 */
class Product
{
    /**
     * @id
     * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     */
    private $id;

    /**
     * @column("name"=>"name","nullable"=>false,"dbType"=>"varchar(255)")
     * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
     **/
    private $name;

    /**
     * @column("name"=>"type","nullable"=>false,"dbType"=>"varchar(255)")
     * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
     **/
    private $type;

    /**
     * @column("name"=>"qteStock","nullable"=>false,"dbType"=>"int(11)")
     * @validator("notNull")
     **/
    private $qteStock;

    /**
     * @column("name"=>"unitPrice","nullable"=>false,"dbType"=>"float")
     * @validator("notNull")
     **/
    private $unitPrice;

    /**
     * @column("name"=>"vat","nullable"=>false,"dbType"=>"float")
     * @validator("notNull")
     **/
    private $vat;

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    public function getVat()
    {
        return $this->vat;
    }

    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    public function getQteStock()
    {
        return $this->qteStock;
    }

    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}