<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Coupon' => 'models\\Coupon',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestCouponsController' => 
  array (
  ),
),
  'controllers\\RestCouponsController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/coupons","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Coupon")
  ),
  'controllers\\RestCouponsController::newCoupon' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/newCoupon", "methods"=>["post"])
  ),
);

