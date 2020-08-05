<?php
use models\Catalog;
use Ubiquity\orm\DAO;
class CatalogTest extends \Codeception\Test\Unit
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
        $c = new Catalog;

        $c->setId(255);
        $c->setLibelle("Ar");
        $c->setDetails("det");
        $c->setImage("Arim");
        $c->setDatec("2020-04-19 19:11:13");

        $conf =[
            "database"=>[
                "type"=>"mysql","dbName"=>"databaseCat","serverName"=>"127.0.0.1","port"=>"3306","user"=>"root",
                "password"=>"","options"=>[],"cache"=>false
            ]
        ];
        DAO::startDatabase($conf);
        Catalog::addCatalog2($c);
        $this->tester->seeInDatabase('Catalog', ["libelle"=>"Ar"]);

    }

    // tests
    public function testSomeFeature()
    {

    }
}