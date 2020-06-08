<?php


namespace models;

/**
 * @table("name"=>"payment")
 **/
class Payment{
    /**
     * @id
     * column("name" => "paymentid", "nullable" => false, "dbType" => "int(11)")
     **/
    private $paymentid;
    /**
     * column("name" => "url", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $url;
    /**
     * column("name" => "title", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $title;
    /**
     * column("name" => "description", "nullable" => true, "dbType" => "varchar(225)")
     **/
    private $description;
    /**
     * column("name" => "image", "nullable" => true, "dbType" => "varchar(225)")
     **/
    private $image;
    /**
     * column("name" => "status", "nullable" => false, "dbType" => "int(2)")
     **/
    private $status;

    /**
     * Payment constructor.
     */
    public function __construct(){

    }
    /**
     * @return mixed
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * @param mixed $paymentid
     */
    public function setPaymentid($paymentid): void
    {
        $this->paymentid = $paymentid;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
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