<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\GiftCardAdminController' => 
  array (
  ),
),
  'controllers\\GiftCardAdminController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/giftcards","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\GiftCardAdmin")
  ),
  'controllers\\GiftCardAdminController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\GiftCardAdminController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\GiftCardAdminController::getOne' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'keyValues'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean|string', 'name' => 'included'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean', 'name' => 'useCache'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getOne/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\GiftCardAdminController::addGiftCard' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addGiftCard", "methods"=>["post"])
  ),
  'controllers\\GiftCardAdminController::updateGiftCard' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updateGiftCard/{keyValues}", "methods"=>["patch"]),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues')
  ),
  'controllers\\GiftCardAdminController::deleteGiftCard' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deleteGiftCard/{keyValues}", "methods"=>["delete"],"priority"=>30)
  ),
);

