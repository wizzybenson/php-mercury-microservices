<?php
namespace controllers;

use models\Favorites;

/**
 * Rest Controller RestFavoritesController
 * @route("/rest/favorites","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Favorites")
 */
class RestFavoritesController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @authorization
     * @param integer|string $customer
     * @route("/getFavoriteProductsByCustomer/{customer}", "methods"=>["get"])
     */
    public function getFavoriteProductsByCustomer($customer){
        echo $this->getResponseFormatter()->get(Favorites::getFavoriteProducts($customer));
    }


    /**
     * @authorization
     * @param integer|string $idCustomer
     * @param integer|string $idProduct
     * @route("/addProduct/{idProduct}/toFavorites/{idCustomer}","methods"=>["post"])
     */
    public function addProductToFavorites($idCustomer, $idProduct){
        $result = Favorites::addProductToFavorites($idCustomer,$idProduct);
        if($result != null)
            if($result != false)
                echo "Item manually added to favorites successfully";
            else
                echo "Item does not added to favorites !";
        else
            echo "Error";
    }

    /**
     * @authorization
     * @param integer|string $idCustomer
     * @param integer|string $idProduct
     * @route("/removeProduct/{idProduct}/fromFavorites/{idCustomer}","methods"=>["delete"])
     */
    public function removeProductFromFavorites($idCustomer, $idProduct){
        $result = Favorites::removeProductFromFavorites($idCustomer,$idProduct);
        if($result != null)
            if($result)
                echo "Item removed from favorites successfully";
            else
                echo "Item does not removed from favorites !";
        else
            echo "Item not found !";

    }
}
