<?php
namespace models;
/**
 * @table("name"=>"paypal_admin")
 **/
class PaypalAdmin{
    /**
     * @id
     * column("name" => "paypalid", "nullable" => false, "dbType" => "int(11)")
     **/
    private $paypalid;
    /**
     * column("name" => "email", "nullable" => false, "dbType" => "varchar(100)")
     **/
    private $email;
    /**
     * column("name" => "sandboxmode", "nullable" => false, "dbType" => "int(2)")
     **/
    private $sandboxmode;
    /**
     * column("name" => "transactionmethod", "nullable" => false, "dbType" => "int(2)")
     **/
    private $transactionmethod;

    /**
     * PaypalAdmin constructor.
     */
    public function __construct(){
    }

    /**
     * @return mixed
     */
    public function getPaypalid()
    {
        return $this->paypalid;
    }

    /**
     * @param mixed $paypalid
     */
    public function setPaypalid($paypalid): void
    {
        $this->paypalid = $paypalid;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSandboxmode()
    {
        return $this->sandboxmode;
    }

    /**
     * @param mixed $sandboxmode
     */
    public function setSandboxmode($sandboxmode): void
    {
        $this->sandboxmode = $sandboxmode;
    }

    /**
     * @return mixed
     */
    public function getTransactionmethod()
    {
        return $this->transactionmethod;
    }

    /**
     * @param mixed $transactionmethod
     */
    public function setTransactionmethod($transactionmethod): void
    {
        $this->transactionmethod = $transactionmethod;
    }

}