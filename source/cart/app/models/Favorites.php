<?php


namespace models;
use Ubiquity\orm\DAO;


/**
 * @table('favorites')
 */
class Favorites
{
    /**
     * @id
     * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
     * @validator("id","constraints"=>array("autoinc"=>true))
     **/
    private $id;

    /**
     * @column("name"=>"id_customer","nullable"=>false,"dbType"=>"int(11)")
     **/
    private $id_customer;

    /**
     * @column("name"=>"id_product","nullable"=>false,"dbType"=>"int(11)")
     **/
    private $id_product;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId_customer(){
        return $this->id_customer;
    }
    public function setId_customer($id_customer){
        $this->id_customer = $id_customer;
    }
    public function getId_product(){
        return $this->id_product;
    }
    public function setId_product($id_product){
        $this->id_product = $id_product;
    }

    public static function addOne($customer, $product){
        $favorite = new Favorites();
        $favorite->setId_customer($customer->getId());
        $favorite->setId_product($product->getId());
        return DAO::insert($favorite);
    }

    public static function getFavoriteProducts($id_customer)
    {
        $favorite_items = array();
        $favorite_items_duplicated = array();
        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        if ($customer === null)
            $customer = DAO::getById(Customer::class, $id_customer);
        if ($customer != null){
            $favorite_items_by_customer = DAO::getAll(Favorites::class, 'id_customer=?',false,[$customer->getId()]);
            foreach ($favorite_items_by_customer as $item) {
                $cmpt = 0;
                foreach ($favorite_items_by_customer as $item1) {
                    if($item->getId_product() === $item1->getId_product()){
                        $cmpt++;
                        if($cmpt >= 10){
                            array_push($favorite_items_duplicated, $item);
                        }
                    }
                }
            }
            foreach (DAO::getAll(Product::class) as $item) {
                foreach ($favorite_items_duplicated as $item1) {
                    if($item->getId() === $item1->getId_product()){
                        $exist = false;
                        foreach ($favorite_items as $item2) {
                            if($item2->getId() === $item->getId()){
                                $exist = true;
                            }
                        }
                        if($exist === false){
                            array_push($favorite_items,$item);
                        }
                    }
                }
            }
        }
        //else the array will be empty

        return $favorite_items;
    }

    public static function addProductToFavorites($id_customer, $id_product){
        $flag = null;
        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        $product = DAO::getOne(Product::class, ["name" => $id_product]);
        if($customer === null || $product === null){
            $customer = DAO::getById(Customer::class, $id_customer);
            $product = DAO::getById(Item::class, $id_product);
        }
        if($customer !== null && $product !== null){
            for($i=0; $i<10; $i++){// should be at least 10 occurrences to be considered as favorite
                $flag = Favorites::addOne($customer,$product);
            }
        }
        return $flag;
    }
    public static function removeProductFromFavorites($id_customer, $id_product){// id_customer -> to remove favorite items proper to a specific customer
        $flag = null;

        $customer = DAO::getOne(Customer::class, ["username" => $id_customer]);
        $product = DAO::getOne(Product::class, ["name" => $id_product]);
        if($customer === null || $product === null){
            $customer = DAO::getById(Customer::class, $id_customer);
            $product = DAO::getById(Product::class, $id_product);
        }
        if($customer !== null && $product !== null){
            foreach (DAO::getAll(Favorites::class) as $favorite){
                if($favorite->getId_customer() === $customer->getId() && $favorite->getId_product() === $product->getId()){
                    $flag = DAO::delete(Favorites::class, $favorite->getId());
                }
            }
        }
        return $flag;
    }
}