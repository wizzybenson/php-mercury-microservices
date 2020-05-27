<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'GiftCardAdmin' => 'models\\GiftCardAdmin',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\GiftCardAdminController' => 
  array (
  ),
),
  'controllers\\GiftCardAdminController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payment/giftCardAdmin","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\GiftCardAdmin")
  ),
  'controllers\\GiftCardAdminController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["get"])
  ),
  'controllers\\GiftCardAdminController::addGiftCard' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["post"])
  ),
  'controllers\\GiftCardAdminController::updateGiftCard' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["put"])
  ),
);

