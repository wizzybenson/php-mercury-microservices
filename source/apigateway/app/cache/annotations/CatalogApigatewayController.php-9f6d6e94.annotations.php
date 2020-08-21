<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
<<<<<<< HEAD
  'controllers\\CatalogApigatewayController' => 
  array (
  ),
),
  'controllers\\CatalogApigatewayController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogs","inherited"=>true,"automated"=>true)
  ),
  'controllers\\CatalogApigatewayController::Test' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Test","methods"=>["get"])
  ),
  'controllers\\CatalogApigatewayController::Test2' => array(
=======
  'controllers\\ApigatewayController' =>
  array (
  ),
),
  'controllers\\ApigatewayController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/catalogs","inherited"=>true,"automated"=>true)
  ),
  'controllers\\ApigatewayController::Test' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Test","methods"=>["get"])
  ),
  'controllers\\ApigatewayController::Test2' => array(
>>>>>>> upstream/master
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/Test2","methods"=>["get"])
  ),
);

