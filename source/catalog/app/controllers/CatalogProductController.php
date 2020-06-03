<?php
namespace controllers;

use models\CatalogProduct;
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
      /*  $cat= new CatalogProduct;

        $catpro= new CatalogProduct;
        //URequest::setPostValuesToObject($catpro);

        $js= json_decode(json_encode(URequest::getDatas()));
        $catpro->setProduct($js->product);
        $catpro->setCatalog($js->catalog);
        $catpro->setId(111);
        $cat->AddProductToCatalog($catpro);*/

        $this->model= new CatalogProduct();
        $this->add();


    }

}
