<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Payments' => 
  array (
  ),
),
  'models\\Payments' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'payments')
  ),
  'models\\Payments::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Payments::$orderss' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"payments","className"=>"models\\Orders")
  ),
);

