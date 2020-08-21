<?php
namespace models;
/**
 * @table("name"=>"payments")
 **/
class Payment{
    /**
     * @id
     * column("name" => "paymentid", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $paymentid;
    /**
     * column("name" => "url", "nullable" => false, "dbType" => "varchar(100)")
     * @validator("notEmpty")
     **/
    private $url;
    /**
     * column("name" => "title", "nullable" => false, "dbType" => "varchar(100)")
     * @validator("notEmpty")
     **/
    private $title;
    /**
     * column("name" => "description", "nullable" => true, "dbType" => "varchar(255)")
     **/
    private $description;
    /**
     * column("name" => "image", "nullable" => false, "dbType" => "varchar(255)")
     * @validator("notEmpty")
     **/
    private $image;
    /**
     * column("name" => "status", "nullable" => false, "dbType" => "int(2)")
	 * @validator("isBool")
     **/
    private $status;
    
    /**
     * @oneToMany("mappedBy"=>"tikakaka","className"=>"models\\CostumorPayment")
     **/
    private $transactions;

    public function __construct(){}

    /**
     * Get the value of paymentid
     */ 
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * Set the value of paymentid
     *
     * @return  self
     */ 
    public function setPaymentid($paymentid)
    {
        $this->paymentid = $paymentid;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getTransactions(){ return $this->transactions; }
    public function setTransactions($transactions){ $this->transactions = $transactions; }
}
?>
