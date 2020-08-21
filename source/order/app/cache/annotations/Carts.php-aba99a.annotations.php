<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Carts' => 
  array (
  ),
),
  'models\\Carts' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'carts')
  ),
  'models\\Carts::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Carts::$created' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"created","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Carts::$orderss' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"carts","className"=>"models\\Orders")
  ),
);

