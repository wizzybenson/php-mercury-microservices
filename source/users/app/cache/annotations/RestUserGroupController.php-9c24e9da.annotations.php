<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Usergroupe' => 'models\\Usergroupe',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestUserGroupController' => 
  array (
  ),
),
  'controllers\\RestUserGroupController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/usergroup","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Usergroupe")
  ),
  'controllers\\RestUserGroupController::getAll' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["get"])
  ),
  'controllers\\RestUserGroupController::addUserGroup' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["post"])
  ),
  'controllers\\RestUserGroupController::updateUserGroup' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "methods"=>["put"])
  ),
);

