<?php


namespace models;

/**
 * Class Coupon
 * @table('coupon')
 */
class Coupon
{
    /**
     * @id
     * @column("name"=>"id","nullable"=>false,"dbType"=>"int")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $id;

    /**
     * @column("name"=>"code","nullable"=>false,"dbType"=>"varchar(255)")
     * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
     **/
    private $code;

    /**
     * @column("name"=>"value","nullable"=>false,"dbType"=>"float")
     **/
    private $value;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Order","name"=>"id_order","nullable"=>false)
     **/
    private $order;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


}