<?php
namespace controllers;

use models\Products;

/**
 * Rest Controller RestProductscontroller
 * @route("/rest/products","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Products")
 */
class RestProductscontroller extends \Ubiquity\controllers\rest\RestController {

    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addProduct(){
        $product = new Products();
        URequest::setPostValuesToObject($product);
        if(DAO::insert($product)){
            echo $this->_getResponseFormatter()->getOne($product);
        }else{
            echo "Error : product not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updateProduct(){
        $values = URequest::getInput();
        $productClass = DAO::getOne($this->model, $values['id']);
        if($productClass != null){
            URequest::setValuesToObject($productClass, $values);
            if(DAO::update($productClass)){
                echo $this->_getResponseFormatter()->getOne($productClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : product not Found!";
        }
    }

    /**
     * @authorization
     * @param array $keyValues
     * @route("/remove/{keyValues}", "methods"=>["delete"])
     */
    public function remove($keyValues){
        if(Products::delete($keyValues))
            echo "product removed from database";
        else
            echo "Error removing !";
    }

    /**
     * @route("methods"=>["patch"])
     */
    public function updateStatus(){
        $values = URequest::getInput();
        $productClass = DAO::getOne($this->model, $values['id']);
        if($productClass != null){
            URequest::setValuesToObject($productClass, $values);
            if(DAO::update($productClass)){
                echo $this->_getResponseFormatter()->getOne($productClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : product not Found!";
        }
    }
}
