<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'models\\Favorites' => 
  array (
  ),
),
  'models\\Favorites' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'favorites')
  ),
  'models\\Favorites::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Favorites::$id_customer' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id_customer","nullable"=>false,"dbType"=>"int(11)")
  ),
  'models\\Favorites::$id_product' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id_product","nullable"=>false,"dbType"=>"int(11)")
  ),
);

