<?php
namespace models;
/**
 * @table("name"=>"gift_card_admin")
 **/
class GiftCardAdmin{
    /**
     * @id
     * column("name" => "giftcardid", "nullable" => false, "dbType" => "int(11)")
     **/
    private $giftcardid;
    /**
     * column("name" => "title", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $title;
    /**
     * column("name" => "description", "nullable" => true, "dbType" => "varchar(225)")
     **/
    private $description;
    /**
     * column("name" => "code", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $code;
    /**
     * column("name" => "expirencedate", "nullable" => false, "dbType" => "date")
     **/
    private $expirencedate;
    /**
     * column("name" => "bound", "nullable" => true, "dbType" => "int(10)")
     **/
    private $bound;
    /**
     * column("name" => "used", "nullable" => true, "dbType" => "int(10)")
     **/
    private $used;
    /**
     * column("name" => "status", "nullable" => true, "dbType" => "int(2)")
     **/
    private $status;

    /**
     * GiftCardAdmin constructor.
     */
    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getGiftcardid()
    {
        return $this->giftcardid;
    }

    /**
     * @param mixed $giftcardid
     */
    public function setGiftcardid($giftcardid): void
    {
        $this->giftcardid = $giftcardid;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getExpirencedate()
    {
        return $this->expirencedate;
    }

    /**
     * @param mixed $expirencedate
     */
    public function setExpirencedate($expirencedate): void
    {
        $this->expirencedate = $expirencedate;
    }

    /**
     * @return mixed
     */
    public function getBound()
    {
        return $this->bound;
    }

    /**
     * @param mixed $bound
     */
    public function setBound($bound): void
    {
        $this->bound = $bound;
    }

    /**
     * @return mixed
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * @param mixed $used
     */
    public function setUsed($used): void
    {
        $this->used = $used;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

}