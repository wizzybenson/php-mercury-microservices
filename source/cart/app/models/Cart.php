<?php
namespace models;
use Ubiquity\orm\DAO;

/**
 * @table('cart')
*/
class Cart{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"created","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $created;

	/**
	 * @oneToMany("mappedBy"=>"cart","className"=>"models\\Item")
	**/
	private $items;

	/**
	 * @manyToOne
	 * @joinColumn("className"=>"models\\Customer","name"=>"id_customer","nullable"=>false)
	**/
	private $customer;

	function __construct()
    {
        $this->items = array();
    }

    public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getCreated(){
		return $this->created;
	}

	 public function setCreated($created){
		$this->created=$created;
	}

	 public function getItems(){
		return $this->items;
	}

	 public function setItems($items){
		$this->items=$items;
	}

	 public function getCustomer(){
		return $this->customer;
	}

	 public function setCustomer($customer){
		$this->customer=$customer;
	}

	 public function __toString(){
		return ($this->created??'no value').'';
	}


    public static function save($cart){
        return DAO::insert($cart);
    }

    public static function delete($id){
        return DAO::delete(Cart::class,$id);
    }

    public static function update($cart){
        return DAO::update($cart);
    }

    public static function getCartsBy($field,$value){
        $carts = array();
        if($field === "customer"){
            foreach (DAO::getAll(Cart::class) as $cart)
                if($cart->getId() === $value || $cart->getCreated() === $value)
                    array_push($carts, $cart);
            return $carts;
        }else if($field === "id" || $field === "created"){
            array_push($cats, DAO::getOne(Cart::class, [$field=>$value]));
            return $carts;
        }else
            return null;
    }

    public function getItemsBy($value){
        $items = array();
        foreach ($this->getItems() as $item)
            if($value === $item->getId() || $value === $item->getDescription())
                array_push($items, $item);
        return $items;
    }

    public function addItem($product_id, $qte, $desc){
	    $product = DAO::getById(Product::class, $product_id);
	    $item = new Item($desc, $qte, $product, $this);
	    if($product->getQteStock() >= $qte){
            try {
                DAO::insert($item);//insert new item
                $product->setQteStock($product->getQteStock()-$qte);//decrement stock quantity
                DAO::update($product);//update product
                                    Favorites::addOne($this->customer, $product);
                return true;
            } catch (\Exception $e) {
                echo 'add item error';
            }
        }
	    return false;
    }
    public function removeItem($id){// remove all products in this item
        foreach ($this->items as $item){
            if($item->getId() == $id){
                $product = DAO::getById(Product::class, $item->getProduct());
                $product->setQteStock($product->getQteStock()+$item->getQuantity());//increment stock quantity
                DAO::update($product);
                DAO::delete(Item::class,$id);
                return true;
            }
        }
        return false;
    }
    public function updateQteItem($id,$qte){// the $qte is considered as absolute value (+/- $qte)
        foreach ($this->items as $item){
            if($item->getId() == $id){
                $product = DAO::getById(Product::class, $item->getProduct());
                if($product->getQteStock() > $qte){
                    $item->setQuantity($item->getQuantity() + $qte);
                    $product->setQteStock($product->getQteStock() - $qte);
                    DAO::update($product);
                    DAO::update($item);
                    return true;//found => break
                }
            }
        }
        return false;
    }
    public function getSubTotal(){
        $total = 0;
        foreach ($this->items as $item){
            $product = DAO::getById(Product::class, $item->getProduct());
            $total += ((float)$product->getUnitPrice() * (int)$item->getQuantity());
        }
        return $total;
    }
    public function getTotal(){
	    $total = 0;
	    foreach ($this->items as $item){
            $product = DAO::getById(Product::class, $item->getProduct());
	        $value = $product->getUnitPrice() * $item->getQuantity();
	        $total += $value + ($value * $product->getVat() / 100);
        }
	    return $total;
    }
    public function getTotalVAT(){
	    return $this->getTotal() - $this->getSubTotal();
    }

    public function clear(){
        foreach ($this->getItems() as $item) {
            $this->removeItem($item->getId());
        }
    }
}