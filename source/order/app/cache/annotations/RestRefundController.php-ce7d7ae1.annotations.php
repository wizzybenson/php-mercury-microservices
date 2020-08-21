<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Refund' => 'models\\Refund',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestRefundController' => 
  array (
  ),
),
  'controllers\\RestRefundController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/refunds","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Refund")
  ),
  'controllers\\RestRefundController::newRefund' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/newRefund","methods"=>["post"])
  ),
  'controllers\\RestRefundController::cancel' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'id'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/cancel/{id}", "methods"=>["put"])
  ),
  'controllers\\RestRefundController::changeStatus' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer', 'name' => 'id'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "changeStatus/{id}", "methods"=>["put"])
  ),
  'controllers\\RestRefundController::getRefundsBy' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'integer|string', 'name' => 'value'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'field'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getRefundsBy/{field}/{value}", "methods"=>["get"])
  ),
);

