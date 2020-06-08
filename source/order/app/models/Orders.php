<?php
namespace models;
/**
 * @table('orders')
*/
class Orders{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"cart_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $cart_id;

	/**
	 * @column("name"=>"payment_method_id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $payment_method_id;

	/**
	 * @column("name"=>"billing_address","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_address;

	/**
	 * @column("name"=>"billing_address_app","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_address_app;

	/**
	 * @column("name"=>"billing_city","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_city;

	/**
	 * @column("name"=>"billing_state","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_state;

	/**
	 * @column("name"=>"billing_zip_code","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_zip_code;

	/**
	 * @column("name"=>"billing_country","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $billing_country;

	/**
	 * @column("name"=>"shipping_address","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_address;

	/**
	 * @column("name"=>"shipping_address_app","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_address_app;

	/**
	 * @column("name"=>"shipping_city","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_city;

	/**
	 * @column("name"=>"shipping_state","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_state;

	/**
	 * @column("name"=>"shipping_zip_code","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_zip_code;

	/**
	 * @column("name"=>"shipping_country","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $shipping_country;

	/**
	 * @column("name"=>"date_order_placed","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $date_order_placed;

	/**
	 * @column("name"=>"date_order_paid","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $date_order_paid;

	/**
	 * @column("name"=>"date_shipped","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $date_shipped;

	/**
	 * @column("name"=>"order_total","nullable"=>false,"dbType"=>"float")
	 * @validator("notNull")
	**/
	private $order_total;

	/**
	 * @column("name"=>"order_note","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $order_note;

	/**
	 * @column("name"=>"order_status","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $order_status;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getCart_id(){
		return $this->cart_id;
	}

	 public function setCart_id($cart_id){
		$this->cart_id=$cart_id;
	}

	 public function getPayment_method_id(){
		return $this->payment_method_id;
	}

	 public function setPayment_method_id($payment_method_id){
		$this->payment_method_id=$payment_method_id;
	}

	 public function getBilling_address(){
		return $this->billing_address;
	}

	 public function setBilling_address($billing_address){
		$this->billing_address=$billing_address;
	}

	 public function getBilling_address_app(){
		return $this->billing_address_app;
	}

	 public function setBilling_address_app($billing_address_app){
		$this->billing_address_app=$billing_address_app;
	}

	 public function getBilling_city(){
		return $this->billing_city;
	}

	 public function setBilling_city($billing_city){
		$this->billing_city=$billing_city;
	}

	 public function getBilling_state(){
		return $this->billing_state;
	}

	 public function setBilling_state($billing_state){
		$this->billing_state=$billing_state;
	}

	 public function getBilling_zip_code(){
		return $this->billing_zip_code;
	}

	 public function setBilling_zip_code($billing_zip_code){
		$this->billing_zip_code=$billing_zip_code;
	}

	 public function getBilling_country(){
		return $this->billing_country;
	}

	 public function setBilling_country($billing_country){
		$this->billing_country=$billing_country;
	}

	 public function getShipping_address(){
		return $this->shipping_address;
	}

	 public function setShipping_address($shipping_address){
		$this->shipping_address=$shipping_address;
	}

	 public function getShipping_address_app(){
		return $this->shipping_address_app;
	}

	 public function setShipping_address_app($shipping_address_app){
		$this->shipping_address_app=$shipping_address_app;
	}

	 public function getShipping_city(){
		return $this->shipping_city;
	}

	 public function setShipping_city($shipping_city){
		$this->shipping_city=$shipping_city;
	}

	 public function getShipping_state(){
		return $this->shipping_state;
	}

	 public function setShipping_state($shipping_state){
		$this->shipping_state=$shipping_state;
	}

	 public function getShipping_zip_code(){
		return $this->shipping_zip_code;
	}

	 public function setShipping_zip_code($shipping_zip_code){
		$this->shipping_zip_code=$shipping_zip_code;
	}

	 public function getShipping_country(){
		return $this->shipping_country;
	}

	 public function setShipping_country($shipping_country){
		$this->shipping_country=$shipping_country;
	}

	 public function getDate_order_placed(){
		return $this->date_order_placed;
	}

	 public function setDate_order_placed($date_order_placed){
		$this->date_order_placed=$date_order_placed;
	}

	 public function getDate_order_paid(){
		return $this->date_order_paid;
	}

	 public function setDate_order_paid($date_order_paid){
		$this->date_order_paid=$date_order_paid;
	}

	 public function getDate_shipped(){
		return $this->date_shipped;
	}

	 public function setDate_shipped($date_shipped){
		$this->date_shipped=$date_shipped;
	}

	 public function getOrder_total(){
		return $this->order_total;
	}

	 public function setOrder_total($order_total){
		$this->order_total=$order_total;
	}

	 public function getOrder_note(){
		return $this->order_note;
	}

	 public function setOrder_note($order_note){
		$this->order_note=$order_note;
	}

	 public function getOrder_status(){
		return $this->order_status;
	}

	 public function setOrder_status($order_status){
		$this->order_status=$order_status;
	}

	 public function __toString(){
		return ($this->order_status??'no value').'';
	}

}