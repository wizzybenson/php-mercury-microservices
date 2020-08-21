<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Client' => 'GuzzleHttp\\Client',
<<<<<<< HEAD
  'Catalog' => 'models\\Catalog',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\CatalogApigatewayController' => 
  array (
  ),
),
  'controllers\\CatalogApigatewayController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogs","inherited"=>true,"automated"=>true)
  ),
  'controllers\\CatalogApigatewayController::Test' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Test","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::connect' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/connectCat","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::connectCotalogProduct' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/connectCatProd","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::getAllCat' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAllCat","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::getById' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getById/{id}","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::deleteCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deleteCatalog/{id}","methods"=>["delete"])
  ),
  'controllers\\CatalogApigatewayController::addCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addCatalog","methods"=>["post"])
  ),
  'controllers\\CatalogApigatewayController::updateCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateCatalog","methods"=>["patch"])
  ),
  'controllers\\CatalogApigatewayController::AddProductToCatalog' => array(
=======
  'Request' => 'http\\Client\\Request',
  'Catalog' => 'models\\Catalog',
  'CatalogProduct' => 'models\\CatalogProduct',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\ApigatewayController' =>
  array (
  ),
),
  'controllers\\ApigatewayController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogs","inherited"=>true,"automated"=>true)
  ),
  'controllers\\ApigatewayController::Test' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Test","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::connect' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/connectCat","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::connectCotalogProduct' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/connectCatProd","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::getAllCat' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAllCat","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::getById' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getById/{id}","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::deleteCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deleteCatalog/{id}","methods"=>["delete"])
  ),
  'controllers\\ApigatewayController::addCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addCatalog","methods"=>["post"])
  ),
  'controllers\\ApigatewayController::updateCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateCatalog","methods"=>["patch"])
  ),
  'controllers\\ApigatewayController::AddProductToCatalog' => array(
>>>>>>> upstream/master
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/ajouterProdToCatalog","methods"=>["post"])
  ),
);

