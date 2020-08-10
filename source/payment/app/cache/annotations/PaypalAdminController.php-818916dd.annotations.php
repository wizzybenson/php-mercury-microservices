<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'PaypalAdmin' => 'models\\PaypalAdmin',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\PaypalAdminController' => 
  array (
  ),
),
  'controllers\\PaypalAdminController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payment/paypalAdmin","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\PaypalAdmin")
  ),
  'controllers\\PaypalAdminController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["get"])
  ),
  'controllers\\PaypalAdminController::addPaypalAccount' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["post"])
  ),
  'controllers\\PaypalAdminController::updatePaypalAccount' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["put"])
  ),
);

