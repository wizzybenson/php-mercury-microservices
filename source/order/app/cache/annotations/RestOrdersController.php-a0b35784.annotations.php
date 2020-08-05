<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Orders' => 'models\\Orders',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestOrdersController' => 
  array (
  ),
),
  'controllers\\RestOrdersController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/orders","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Orders")
  ),
  'controllers\\RestOrdersController::getCartByOrderId' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getCartByOrderId/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\RestOrdersController::newOrder' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/newOrder", "methods"=>["post"])
  ),
);

