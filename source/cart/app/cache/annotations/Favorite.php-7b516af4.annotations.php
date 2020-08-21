<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'models\\Favorite' => 
  array (
  ),
),
  'models\\Favorite' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'cart')
  ),
  'models\\Favorite::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Favorite::$items' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"favorite","className"=>"models\\Item")
  ),
  'models\\Favorite::$customer' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Customer","name"=>"id_customer","nullable"=>false)
  ),
);

