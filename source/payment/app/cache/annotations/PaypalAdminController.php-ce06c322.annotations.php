<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\PaypalAdminController' => 
  array (
  ),
),
  'controllers\\PaypalAdminController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/payments/paypalAdmin","inherited"=>false,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\PaypalAdmin")
  ),
  'controllers\\PaypalAdminController::options' => array(
    array('#name' => 'options', '#type' => 'Ubiquity\\annotations\\router\\OptionsAnnotation', "/{url}")
  ),
  'controllers\\PaypalAdminController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getAll", "methods"=>["get"])
  ),
  'controllers\\PaypalAdminController::getOne' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'keyValues'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean|string', 'name' => 'included'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'boolean', 'name' => 'useCache'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/getOne/{keyValues}", "methods"=>["get"])
  ),
  'controllers\\PaypalAdminController::addPaypal' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/addPaypal", "methods"=>["post"])
  ),
  'controllers\\PaypalAdminController::updatePaypal' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/updatePaypal/{keyValues}", "methods"=>["patch"]),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues')
  ),
  'controllers\\PaypalAdminController::deletePaypal' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'array', 'name' => 'keyValues'),
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/deletePaypal/{keyValues}", "methods"=>["delete"],"priority"=>30)
  ),
);

