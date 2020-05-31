<?php
namespace models;
/**
 * @table('item')
*/
class Item{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"description","nullable"=>false,"dbType"=>"varchar(255)")
	 * @validator("length","constraints"=>array("max"=>255,"notNull"=>true))
	**/
	private $description;

	/**
	 * @column("name"=>"quantity","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("notNull")
	**/
	private $quantity;

    /**
     * @manyToOne
     * @joinColumn("className"=>"models\\Product","name"=>"id_product","nullable"=>false)
     */
	private $product;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Cart","name"=>"id_cart","nullable"=>false)
	**/
	private $cart;

    /**
     * Item constructor.
     * @param $description
     * @param $quantity
     * @param $product
     * @param $cart
     */
    public function __construct($description="", $quantity=0, $product=null, $cart=null)
    {
        $this->description = $description;
        $this->quantity = $quantity;
        $this->product = $product;
        $this->cart = $cart;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
    }

    public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

}