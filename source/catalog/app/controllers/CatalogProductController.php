<?php
namespace controllers;

use models\Catalog;
use models\CatalogProduct;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller CatalogProductController
 * @route("/rest/catalogproducts","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\\CatalogProduct")
 */
class CatalogProductController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/ajouterProdToCatalog/","methods"=>["post"])
     */
    public function AddProductToCatalog()
    {
        $catpro= new CatalogProduct;

        $catpro->setProduct("1");
        $catpro->setCatalog("1");
        $catpro->setDatecp("2010-05-07 00:00:0");

        echo $catpro->getCatalog().'-'.$catpro->getProduct();
        if(DAO::insert($catpro))
        {
            echo true;
        }else
        {
            echo false;
        }


    }
    /**
     * @route("/addProdCat","methods"=>["post"])
     */
    public function addProdCat()
    {
        $cat= new CatalogProduct();
        URequest::setPostValuesToObject($cat);
        if($cat->addprotoCatalog())
            echo json_encode(["status"=>"OK 200","title"=>"CatalogProduct added"]);
        else
            echo json_encode(["status"=>"OK 200","title"=>"CatalogProduct adding !"]);
    }






}
