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
  'controllers\\RestOrderController::getOrdersBy' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'field'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string|integer', 'name' => 'value'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getOrdersBy/{field}/{value}", "methods"=>["get"])
  ),
  'controllers\\RestOrderController::makePayment' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idOrder'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/makePayment/{idOrder}", "methods"=>["put"])
  ),
  'controllers\\RestOrderController::change_status' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'id'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/change-status/{id}", "methods"=>["put"])
  ),
  'controllers\\RestOrderController::getAmount' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'id'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAmount/{id}", "methods"=>["get"])
  ),
<<<<<<< HEAD
=======
  'controllers\\RestOrderController::getTotalDiscountByOrder' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'idOrder'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getTotalDiscountByOrder/{idOrder}", "methods"=>["get"])
  ),
>>>>>>> upstream/master
);

