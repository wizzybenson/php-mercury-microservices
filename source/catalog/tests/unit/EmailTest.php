<?php declare(strict_types=1);

use models\CatalogProduct;
use PHPUnit\Framework\TestCase;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Catalog;




final class CatalogTest extends TestCase
{
    public function testValidation()
    {
       /* $c = new Catalog();
        $c->setLib("Ar");
        $c->setDetails("det");
        $c->setImage("Arim");
        $c->addCatalog();
        $this->tester->seeInDatabase();
       /* $cat = new Catalog;
        $cat->setLibelle(null);

        $this->assertFalse($cat->validate(null));

      /*  $cat->setName('toolooooongnaaaaaaameeee');
        $this->assertFalse($cat->validate(['username']));*/

    }
   /* public function testCanBeCreatedFromValidLibelle(): void
    {
        $cat= new Catalog;
        $cat->setLibelle("KHALKI Add");
        $cat->setDetails("KHALKI Details Add");
        $cat->setImage("KHALKI im");
        $cat->setDatec("2020-03-04 00:00:00");
        $this->assertInstanceOf(
            Catalog::class,
            Catalog::fromString($cat)
        );
    }

    public function testCannotBeCreatedFromInvalidLibelle(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $cat= new Catalog;
        $cat->setLibelle("KHALKI Add");
        $cat->setDetails("KHALKI Details Add");
        $cat->setImage("KHALKI im");
        $cat->setDatec("2020-03-04 00:00:00");
        Catalog::fromString($cat);
    }

    public function testCanBeUsedAsString(): void
    {
        $cat= new Catalog;
         $cat->setLibelle("KHALKI Add");
         $cat->setDetails("KHALKI Details Add");
         $cat->setImage("KHALKI im");
         $cat->setDatec("2020-03-04 00:00:00");
        $this->assertEquals(
            $cat,
            Catalog::fromString($cat)
        );
    }*/
}





