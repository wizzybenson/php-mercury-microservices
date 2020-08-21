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
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation')
  ),
  'models\\GiftCardAdmin::getGiftcardid' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setGiftcardid' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'giftcardid')
  ),
  'models\\GiftCardAdmin::getTitle' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setTitle' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'title')
  ),
  'models\\GiftCardAdmin::getDescription' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setDescription' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'description')
  ),
  'models\\GiftCardAdmin::getCode' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setCode' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'code')
  ),
  'models\\GiftCardAdmin::getExpirencedate' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setExpirencedate' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'expirencedate')
  ),
  'models\\GiftCardAdmin::getBound' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setBound' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'bound')
  ),
  'models\\GiftCardAdmin::getUsed' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setUsed' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'used')
  ),
  'models\\GiftCardAdmin::getStatus' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\GiftCardAdmin::setStatus' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'status')
  ),
);

