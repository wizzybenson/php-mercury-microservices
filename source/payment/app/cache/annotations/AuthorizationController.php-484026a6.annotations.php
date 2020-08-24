<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'PayPalHttpClient' => 'PayPalCheckoutSdk\\Core\\PayPalHttpClient',
  'SandboxEnvironment' => 'PayPalCheckoutSdk\\Core\\SandboxEnvironment',
  'ProductionEnvironment' => 'PayPalCheckoutSdk\\Core\\ProductionEnvironment',
  'AuthorizationsCaptureRequest' => 'PayPalCheckoutSdk\\Payments\\AuthorizationsCaptureRequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\AuthorizationController' => 
  array (
  ),
),
  'controllers\\AuthorizationController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/authorizations","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Authorization")
  ),
  'controllers\\AuthorizationController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\AuthorizationController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\AuthorizationController::getCountNotCaptured' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getCountNotCaptured", "methods"=>["get"])
  ),
  'controllers\\AuthorizationController::capturePaypalAuth' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/capturePaypalAuth", "methods"=>["post"])
  ),
);

