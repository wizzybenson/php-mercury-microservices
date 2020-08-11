<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'OrmUtils' => 'Ubiquity\\orm\\OrmUtils',
  'OrdersCaptureRequest' => 'PayPalCheckoutSdk\\Orders\\OrdersCaptureRequest',
  'OrdersCreateRequest' => 'PayPalCheckoutSdk\\Orders\\OrdersCreateRequest',
  'PayPalHttpClient' => 'PayPalCheckoutSdk\\Core\\PayPalHttpClient',
  'SandboxEnvironment' => 'PayPalCheckoutSdk\\Core\\SandboxEnvironment',
  'ProductionEnvironment' => 'PayPalCheckoutSdk\\Core\\ProductionEnvironment',
),
  '#traitMethodOverrides' => array (
  'controllers\\CostumorPaymentController' => 
  array (
  ),
),
  'controllers\\CostumorPaymentController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/costumorpayments","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\CostumorPayment")
  ),
  'controllers\\CostumorPaymentController::getPaypalPayment' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getPaypalPayment/{token}", "methods"=>["get"])
  ),
  'controllers\\CostumorPaymentController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\CostumorPaymentController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\CostumorPaymentController::addPayment' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addPayment", "methods"=>["post"])
  ),
);

