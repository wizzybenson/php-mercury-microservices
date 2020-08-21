<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'controllers\\RestWeightscontroller' => 
  array (
  ),
),
  'controllers\\RestWeightscontroller' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/weights","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Weights")
  ),
);

