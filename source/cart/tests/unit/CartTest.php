<?php
use \models\Cart;
use Ubiquity\orm\DAO;

class CartTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testSave()
    {
        $cart = new Cart();
        $cart->setCreated("2020-03-12 00:00:00");
        $cart->setCustomer(null);
        $cart->setItems(null);

        Cart::save($cart);
        $this->tester->seeInDatabase('cart', ['created'=>'2009-05-24 00:00:00']);

        //$this->assertNotNull(DAO::getOne(Cart::class,["created"=>"2020-03-12 00:00:00"]));
    }

    public function testDelete(){
        Cart::delete(19);
        $this->assertNull(DAO::getById(Cart::class,19));
    }

    public function testUpdate(){
        $cart = DAO::getById(Cart::class,1);
        $cart->setCreated("2020-12-11 00:00:00");
        Cart::update($cart);
        $this->assertEquals($cart->getCreated(),DAO::getById(Cart::class,1)->getCreated());
    }

    public function testGetCartsBy(){
        $field = "customer";
        $var = "arouay abdelalim";
        $this->assertNotNull(Cart::getCartsBy($field,$var));
    }

    public function testGetItemsBy(){
        $testCart = DAO::getById(Cart::class,1);
        $testItems = $testCart->getItemsBy("id",1);
        $this->assertContains($testItems,DAO::getById(\models\Item::class,1));
    }

    public function testAddItem(){
        $cart = DAO::getById(Cart::class, 1);
        $cart->addItem(1,2,"testing description");
        $this->tester->seeInDatabase('item', ['description'=>'testing description']);
    }

    public function testRemoveItem(){
        $cart = DAO::getById(Cart::class,1);
        $item = DAO::getOne(\models\Item::class, ['description'=>'testing description']);
        if($item != null){
            $cart->removeItem($item);
            $this->tester->cantSeeInDatabase(\models\Item::class,['id'=>$item->getId()]);
        }
        $this->assertNotNull($item,["Item does not exist"]);
    }

    public function testUpdateQteItem(){
        $cart = DAO::getById(Cart::class,1);
        $item = DAO::getOne(\models\Item::class, ['description'=>'testing description']);
        if($item != null){
            $oldQte = $item->getQuantity();
            $cart->updateQteItem($item->getId(),2);
            $this->tester->canSeeInDatabase(\models\Item::class,['id'=>$item->getId(), 'quantity'=>$oldQte + 2]);
        }
        $this->assertNotNull($item,["Item does not exist"]);
    }

    public function testGetTotal(){
        //new cart
        $cart = new Cart();
        $cart->setCreated("3030-06-06 00:00:00");
        Cart::save($cart);
        $cart = DAO::getOne(Cart::class,['created'=>'3030-06-06 00:00:00']);// to obtain the id

        //add products of test
        $product1 = new \models\Product();
        $product2 = new \models\Product();
        $product1->setName("testp1");
        $product1->setQteStock(2);
        $product1->setUnitPrice(150);
        $product1->setVat(6);
        $product1->setName("testp2");
        $product2->setQteStock(1);
        $product1->setUnitPrice(1000);
        $product2->setVat(2.5);
        DAO::insert($product1);
        DAO::insert($product2);
        $product1 = DAO::getOne(\models\Product::class, ["name"=>"testp1"]);
        $product2 = DAO::getOne(\models\Product::class, ["name"=>"testp2"]);//to get products with their ids

        //add items to cart
        $cart->addItem($product1, 2, "item for test 1");
        $cart->addItem($product2, 1, "item for test 1");

        //test
        $this->assertEquals(1300, $cart->getSubTotal());
        $this->assertEquals(1343, $cart->getTotal());
        $this->assertEquals(43, $cart->getTotalVAT());

        //delete cart
        Cart::delete($cart->getId());

        //delete test's products
        DAO::delete(\models\Product::class, $product1->getId());
        DAO::delete(\models\Product::class, $product2->getId());
    }

    public function testClear(){

    }
}