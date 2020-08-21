<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
),
  '#traitMethodOverrides' => array (
  'models\\CatalogProduct' => 
  array (
  ),
),
  'models\\CatalogProduct::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\CatalogProduct::$catalog' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"catalog","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull"),
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Catalog","name"=>"catalog","nullable"=>false)
  ),
  'models\\CatalogProduct::$product' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"product","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull"),
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Product","name"=>"product","nullable"=>false)
  ),
  'models\\CatalogProduct::$datecp' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"datecp","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
);

