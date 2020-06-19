<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Order' => 'models\\Order',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestOrderController' => 
  array (
  ),
),
  'controllers\\RestOrderController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/orders","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Order")
  ),
  'controllers\\RestOrderController::getCartByOrder' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getCartByOrderId/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\RestOrderController::newOrder' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/newOrder", "methods"=>["post"])
  ),
  'controllers\\RestOrderController::deleteOrder' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deleteOrder/{keyValues}", "methods"=>["delete"])
  ),
);

