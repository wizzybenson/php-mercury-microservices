<?php
use \models\Order;
use \Ubiquity\orm\DAO;
class orderTest extends \Codeception\Test\Unit
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

    // tests
    public function testSomeFeature()
    {

    }
    public function testGetCart(){

    }
    public function testGetOrdersBy(){

    }
    public function testMakePayment(){

    }
    public function testChangeStatus(){

    }
    public function testSave(){
        $order = new Order();
        $order->setBilling_address("billing_address_for_test");
        $order->setShipping_address("shipping_address_for_test");
        $order->save('332b31417a55ee7e8c3b');//token expires in 60 minutes
        $this->assertEquals("billing_address_for_test shipping_address_for_test", $order->getBilling_address()." ".$order->getShipping_address());
        $this->tester->seeInDatabase('order', ['billing_address'=>'billing_address_for_test', "shipping_address"=>"shipping_address_for_test"]);
    }
    public function testDelete(){
        try {
            $order = DAO::getOne(Order::class, ['billing_address' => 'billing_address_for_test', "shipping_address" => "shipping_address_for_test"]);
        } catch (\Ubiquity\exceptions\DAOException $e) {
            echo $e->getMessage();
        }
        $order->delete();
        $this->tester->cantSeeInDatabase(Order::class, ["id"=>$order->getId()]);
    }
}