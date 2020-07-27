<?php


namespace models;

use Ubiquity\orm\DAO;

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
     * @column("name"=>"creation_date", "nullable"=>false, "dbType"=>"datetime")
     * @validator("type","dateTime","constraints"=>array("notNull"=>true))
     */
    private $creation_date;

    /**
     * @column("name"=>"expiration_date", "nullable"=>false, "dbType"=>"datetime")
     * @validator("type","dateTime","constraints"=>array("notNull"=>true))
     */
    private $expiration_date;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Order","name"=>"id_order","nullable"=>false)
     **/
    private $order;

    public function attributeToOrder($idOrder){
        if($this->getCreationDate() < $this->getExpirationDate()){
            $order = DAO::getOne(Order::class, $idOrder);
            $this->setOrder($order);
            try {
                DAO::insert($this);
            }catch (\Exception $e){
                echo $e->getMessage();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
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