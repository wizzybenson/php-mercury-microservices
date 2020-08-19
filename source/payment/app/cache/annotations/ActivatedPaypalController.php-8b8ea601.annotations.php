<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\ActivatedPaypalController' => 
  array (
  ),
),
  'controllers\\ActivatedPaypalController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/activated_paypal","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\ActivatedPaypal")
  ),
  'controllers\\ActivatedPaypalController::getActivated' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getActivated", "methods"=>["get"])
  ),
  'controllers\\ActivatedPaypalController::updateAcivePaypal' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateAcivePaypal/{keyValues}", "methods"=>["patch"]),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues')
  ),
);

