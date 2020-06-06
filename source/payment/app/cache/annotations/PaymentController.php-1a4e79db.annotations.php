<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Payment' => 'models\\Payment',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\PaymentController' => 
  array (
  ),
),
  'controllers\\PaymentController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payment/payment","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Payment")
  ),
);

