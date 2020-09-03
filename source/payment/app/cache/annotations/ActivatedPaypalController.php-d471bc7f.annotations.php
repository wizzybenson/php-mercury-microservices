<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
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
  'controllers\\ActivatedPaypalController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\ActivatedPaypalController::getActivated' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getActivated", "methods"=>["get"])
  ),
  'controllers\\ActivatedPaypalController::updateActivatedPaypal' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateActivatedPaypal/{paypalId}", "methods"=>["patch"])
  ),
);

