<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'models\\Product' => 
  array (
  ),
),
  'models\\Product' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'product')
  ),
  'models\\Product::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Product::$name' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"name","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Product::$type' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"type","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Product::$qteStock' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"qteStock","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Product::$unitPrice' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"unitPrice","nullable"=>false,"dbType"=>"float"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Product::$vat' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"vat","nullable"=>false,"dbType"=>"float"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
);

