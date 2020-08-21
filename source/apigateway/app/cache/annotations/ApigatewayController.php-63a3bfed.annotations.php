<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Response' => 'http\\Client\\Response',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'SenderClass' => 'res\\SenderClass',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
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

