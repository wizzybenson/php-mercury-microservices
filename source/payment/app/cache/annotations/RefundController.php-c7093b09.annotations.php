<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'CapturesRefundRequest' => 'PayPalCheckoutSdk\\Payments\\CapturesRefundRequest',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'PayPalHttpClient' => 'PayPalCheckoutSdk\\Core\\PayPalHttpClient',
  'SandboxEnvironment' => 'PayPalCheckoutSdk\\Core\\SandboxEnvironment',
  'ProductionEnvironment' => 'PayPalCheckoutSdk\\Core\\ProductionEnvironment',
),
  '#traitMethodOverrides' => array (
  'controllers\\RefundController' => 
  array (
  ),
),
  'controllers\\RefundController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/refunds","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Refund")
  ),
  'controllers\\RefundController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\RefundController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\RefundController::addPaymentRefund' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addPaymentRefund", "methods"=>["post"])
  ),
);

