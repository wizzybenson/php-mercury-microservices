<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Favorites' => 'models\\Favorites',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestFavoritesController' => 
  array (
  ),
),
  'controllers\\RestFavoritesController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/favorites","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Favorites")
  ),
  'controllers\\RestFavoritesController::getFavoriteProductsByCustomer' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'customer'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getFavoriteProductsByCustomer/{customer}", "methods"=>["get"])
  ),
  'controllers\\RestFavoritesController::addProductToFavorites' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idCustomer'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idProduct'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addProduct/{idProduct}/toFavorites/{idCustomer}","methods"=>["post"])
  ),
  'controllers\\RestFavoritesController::removeProductFromFavorites' => array(
    array('#name' => 'authorization', '#type' => 'Ubiquity\\annotations\\rest\\AuthorizationAnnotation'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idCustomer'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'idProduct'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/removeProduct/{idProduct}/fromFavorites/{idCustomer}","methods"=>["delete"])
  ),
);

