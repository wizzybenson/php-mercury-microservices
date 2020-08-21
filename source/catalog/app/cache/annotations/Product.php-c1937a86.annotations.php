<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'models\\Product' => 
  array (
  ),
),
  'models\\Product::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Product::$lib' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"lib","nullable"=>false,"dbType"=>"varchar(200)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>200,"notNull"=>true))
  ),
  'models\\Product::$catalogProducts' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"product","className"=>"models\\CatalogProduct")
  ),
);

