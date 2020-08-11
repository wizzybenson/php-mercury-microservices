<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\PaymentController' => 
  array (
  ),
),
  'controllers\\PaymentController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/payments","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Payment")
  ),
  'controllers\\PaymentController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\PaymentController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\PaymentController::getPayment' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getPayment/{id}", "methods"=>["get"])
  ),
  'controllers\\PaymentController::getActivatedPayments' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getActivatedPayments", "methods"=>["get"])
  ),
  'controllers\\PaymentController::updatePayment' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updatePayment/{keyValues}", "methods"=>["patch"]),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues')
  ),
);

