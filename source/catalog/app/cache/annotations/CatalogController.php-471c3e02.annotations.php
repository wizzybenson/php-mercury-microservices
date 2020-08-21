<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Catalog' => 'models\\Catalog',
  'CatalogProduct' => 'models\\CatalogProduct',
  'RestBaseController' => 'Ubiquity\\controllers\\rest\\RestBaseController',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\CatalogController' => 
  array (
  ),
),
  'controllers\\CatalogController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogs","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\\Catalog")
  ),
  'controllers\\CatalogController::getAllCat' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAllCat","methods"=>["get"])
  ),
  'controllers\\CatalogController::getById' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getById/{id}","methods"=>["get"])
  ),
  'controllers\\CatalogController::addCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addCatalog","methods"=>["post"])
  ),
  'controllers\\CatalogController::deleteCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deleteCatalog/{id}","methods"=>["delete"])
  ),
  'controllers\\CatalogController::AddProductToCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/ajouterProdToCatalog/","methods"=>["post"])
  ),
);

