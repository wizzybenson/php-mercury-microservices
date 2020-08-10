<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Catalog' => 'models\\Catalog',
  'Product' => 'models\\Product',
),
  '#traitMethodOverrides' => array (
  'controllers\\ProductController' => 
  array (
  ),
),
  'controllers\\ProductController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/products","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\\Product")
  ),
  'controllers\\ProductController::getAllProd' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAllProd","methods"=>["get"])
  ),
  'controllers\\ProductController::getById' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getById/{id}","methods"=>["get"])
  ),
);

