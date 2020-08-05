<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'Category' => 'models\\Category',
  'Router' => 'Ubiquity\\controllers\\Router',
),
  '#traitMethodOverrides' => array (
  'controllers\\RestCategorysController' => 
  array (
  ),
),
  'controllers\\RestCategorysController' => array(
    array('#name' => 'route', '#type' => 'Ubiquity\\annotations\\router\\RouteAnnotation', "/rest/categorys","inherited"=>true,"automated"=>true),
    array('#name' => 'rest', '#type' => 'Ubiquity\\annotations\\rest\\RestAnnotation', "resource"=>"models\Category")
  ),
);

