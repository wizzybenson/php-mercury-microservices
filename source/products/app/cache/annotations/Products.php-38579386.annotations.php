<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Products' => 
  array (
  ),
),
  'models\\Products' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'products')
  ),
  'models\\Products::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Products::$lib' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"lib","nullable"=>false,"dbType"=>"varchar(200)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>200,"notNull"=>true))
  ),
);

