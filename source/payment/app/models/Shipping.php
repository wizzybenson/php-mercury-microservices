<?php
namespace models;

use Ubiquity\orm\DAO;

/**
 * @table("name"=>"shipping")
 **/
class Shipping{
    /**
     * @id
     * column("name" => "shippingid ", "nullable" => false, "dbType" => "int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $shippingid;
    /**
     * column("name" => "amount", "nullable" => false, "dbType" => "decimal(10,2)")
     **/
    private $amount;
    /**
     * column("name" => "method", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $method;
    /**
     * column("name" => "full_name", "nullable" => false, "dbType" => "varchar(60)")
     **/
    private $full_name;
    /**
     * column("name" => "address_line_1", "nullable" => false, "dbType" => "varchar(50)")
     **/
    private $address_line_1;
    /**
     * column("name" => "address_line_2", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $address_line_2;
    /**
     * column("name" => "admin_area_2", "nullable" => false, "dbType" => "varchar(40)")
     **/
    private $admin_area_2;
    /**
     * column("name" => "admin_area_1", "nullable" => false, "dbType" => "varchar(12)")
     **/
    private $admin_area_1;
    /**
     * column("name" => "postal_code", "nullable" => false, "dbType" => "int(7)")
     **/
    private $postal_code;
    /**
     * column("name" => "country_code", "nullable" => false, "dbType" => "varchar(4)")
     **/
    private $country_code;

    public function __construct(){}

    public function getShippingid(){ return $this->shippingid; }
    public function setShippingid($shippingid){ $this->shippingid = $shippingid; }

    public function getAmount(){ return $this->amount; }
    public function setAmount($amount){ $this->amount = $amount; }

    public function getMethod(){ return $this->method; }
    public function setMethod($method){ $this->method = $method; }

    public function getFull_name(){ return $this->full_name; }
    public function setFull_name($full_name){ $this->full_name = $full_name; }

    public function getAddress_line_1(){ return $this->address_line_1; }
    public function setAddress_line_1($address_line_1){ $this->address_line_1 = $address_line_1; }

    public function getAddress_line_2(){ return $this->address_line_2; }
    public function setAddress_line_2($address_line_2){ $this->address_line_2 = $address_line_2; }

    public function getAdmin_area_2(){ return $this->admin_area_2; }
    public function setAdmin_area_2($admin_area_2){ $this->admin_area_2 = $admin_area_2; }

    public function getAdmin_area_1(){ return $this->admin_area_1; }
    public function setAdmin_area_1($admin_area_1){ $this->admin_area_1 = $admin_area_1; }

    public function getPostal_code(){ return $this->postal_code; }
    public function setPostal_code($postal_code){ $this->postal_code = $postal_code; }

    public function getCountry_code(){ return $this->country_code; }
    public function setCountry_code($country_code){ $this->country_code = $country_code; }

    public static function addShipping($shipping){
        $result = DAO::insert($shipping);
 		// very important to check sql transaction
         if(!$result){
			throw new \Exception("Unable to insert shipping");
		}
		return $shipping;
    }
	public static function addShippingWithBody($amount, $shippingBody){
		$shipping = new \models\Shipping();
		$shipping->setAmount($amount);
		$shipping->setMethod($shippingBody['method']);
		$shipping->setFull_name($shippingBody['name']['full_name']);
		$shipping->setAddress_line_1($shippingBody['address']['address_line_1']);
		$shipping->setAddress_line_2($shippingBody['address']['address_line_2']);
		$shipping->setAdmin_area_2($shippingBody['address']['admin_area_2']);
		$shipping->setAdmin_area_1($shippingBody['address']['admin_area_1']);
		$shipping->setPostal_code($shippingBody['address']['postal_code']);
		$shipping->setCountry_code($shippingBody['address']['country_code']);

        $shipping = self::addShipping($shipping);
        
        return $shipping;
    }
    
}
