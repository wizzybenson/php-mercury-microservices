<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Response' => 'http\\Env\\Response',
  'Body' => 'http\\Message\\Body',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestCostumerController' => 
  array (
  ),
),
  'controllers\\RestCostumerController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/customers","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Customer")
  ),
  'controllers\\RestCostumerController::tester' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/tester", "methods"=>["get"])
  ),
);

