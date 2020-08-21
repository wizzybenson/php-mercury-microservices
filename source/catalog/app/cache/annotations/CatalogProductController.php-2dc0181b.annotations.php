<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'CatalogProduct' => 'models\\CatalogProduct',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\CatalogProductController' => 
  array (
  ),
),
  'controllers\\CatalogProductController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogproducts","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\\CatalogProduct")
  ),
  'controllers\\CatalogProductController::AddProductToCatalog' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/ajouterProdToCatalog/","methods"=>["post"])
  ),
);

