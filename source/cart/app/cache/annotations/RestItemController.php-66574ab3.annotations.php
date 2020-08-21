<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\RestItemController' => 
  array (
  ),
),
  'controllers\\RestItemController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/items","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Item")
  ),
);

