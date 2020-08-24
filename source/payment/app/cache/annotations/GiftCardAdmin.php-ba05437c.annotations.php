<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\GiftCardAdmin' => 
  array (
  ),
),
  'models\\GiftCardAdmin' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"gift_card_admin")
  ),
  'models\\GiftCardAdmin::$giftcardid' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\GiftCardAdmin::$title' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\GiftCardAdmin::$code' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\GiftCardAdmin::$max_use' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\GiftCardAdmin::$status' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "isBool")
  ),
);

