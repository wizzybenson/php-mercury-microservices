<?php
namespace controllers;

use models\Catalog;
use models\CatalogProduct;
use Ubiquity\controllers\rest\RestBaseController;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller CatalogController
 * @route("/rest/catalogs","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\\Catalog")
 */
class CatalogController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getAllCat","methods"=>["get"])
     */
    public function getAllCat()
    {
        $cat= new Catalog;
        $cs=$cat->getAllCat();
        echo $this->_getResponseFormatter()->get($cs);
    }
    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
    public function getById($id)
    {
        $cat= new Catalog;
        $cs=$cat->getByID($id);
        echo $cs;
    }

    /**
     * @route("/addCatalog","methods"=>["post"])
     */
    public function addCatalog()
    {
        $cat= new Catalog;
        $cs=$cat->addCatalog();
        return $cs;
    }

    /**
     * @route("/deleteCatalog/{id}","methods"=>["delete"])
     */
    public function deleteCatalog($id)
    {
        $cat= new Catalog;
        $cs=$cat->deleteCatalog($id);
        return $cs;
    }


    /**
     * @route("/ajouterProdToCatalog/","methods"=>["post"])
     */
    public function AddProductToCatalog()
    {
        $cat= new CatalogProduct();

        $this->model= new CatalogProduct();
        $this->add();
        /*$js= json_decode(json_encode(URequest::getDatas()));
        $catpro->setProduct($js->product);
        $catpro->setCatalog($js->catalog);
        $catpro->setId(111);*/
       // $cat->AddProductToCatalog();

        //echo $cs;
    }



}
