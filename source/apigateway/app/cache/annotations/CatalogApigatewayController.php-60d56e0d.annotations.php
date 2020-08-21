<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Client' => 'GuzzleHttp\\Client',
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
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/ajouterProdToCatalog","methods"=>["post"])
  ),
);

