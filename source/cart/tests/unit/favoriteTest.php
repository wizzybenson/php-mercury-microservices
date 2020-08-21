<?php
use \models\Favorites;
use \models\Cart;
use Ubiquity\orm\DAO;

class favoriteTest extends \Codeception\Test\Unit
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

    public function testAddFavoriteAutomatically(){
        $cart = DAO::getById(\models\Customer::class, 9);//customer username : ndavis
        $flag = false;
        for ($i=0; $i<10; $i++){
            if($cart->addItem(DAO::getById(\models\Item::class, 9)) === null)
                $flag = true;
        }
        $this->assertFalse($flag);
    }
    public function testAddFavoriteItemManually(){
        $this->assertNotNull(Favorites::addFavoriteItemManually("jamie.moen","Parisian Ltd"));
    }
    public function testRemoveItemFromFavorites(){
        $this->assertNotNull(Favorites::removeItemFromFavorites("jamie.moen","Parisian Ltd"));
    }
    public function testGetFavoriteItems(){
        $items = Favorites::getFavoriteItems("garett.fritsch");
        $this->assertCount(2,$items);//garett.fritsch has two favorites items
    }
}