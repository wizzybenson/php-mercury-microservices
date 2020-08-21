<?php
namespace controllers;

use models\Catalog;
use models\Product;

/**
 * Rest Controller ProductController
 * @route("/rest/products","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\\Product")
 */
class ProductController extends \Ubiquity\controllers\rest\RestController {

    /**
     * @route("/getAllProd","methods"=>["get"])
     */
    public function getAllProd()
    {
        $pro= new Product();
        $pr=$pro->getAllProd();
        echo $this->_getResponseFormatter()->get($pr);
    }
    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
    public function getById($id)
    {
        $pro= new Product();
        $pr=$pro->getByID($id);
        echo $pr;
    }

}
