<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'Paypal' => 'Models\\Paypal',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\PaypalController' => 
  array (
  ),
),
  'controllers\\PaypalController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payment/paypal","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Paypal")
  ),
);

