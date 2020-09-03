<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'SenderClass' => 'res\\SenderClass',
),
  '#traitMethodOverrides' => array (
  'controllers\\ApigatewayController' => 
  array (
  ),
),
  'controllers\\ApigatewayController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/apigateway","inherited"=>true,"automated"=>true)
  ),
  'controllers\\ApigatewayController::send' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/{uri}")
  ),
);

