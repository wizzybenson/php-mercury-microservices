<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\GiftCardTransactionController' => 
  array (
  ),
),
  'controllers\\GiftCardTransactionController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/gift_card_transactions","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\GiftCardTransaction")
  ),
  'controllers\\GiftCardTransactionController::getGiftCardTransaction' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getOne/{id}", "methods"=>["get"])
  ),
);

