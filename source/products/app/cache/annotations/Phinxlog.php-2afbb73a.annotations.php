<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Phinxlog' => 
  array (
  ),
),
  'models\\Phinxlog' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'phinxlog')
  ),
  'models\\Phinxlog::$version' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"version","nullable"=>false,"dbType"=>"bigint(20)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Phinxlog::$migration_name' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"migration_name","nullable"=>true,"dbType"=>"varchar(100)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>100))
  ),
  'models\\Phinxlog::$start_time' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"start_time","nullable"=>true,"dbType"=>"timestamp")
  ),
  'models\\Phinxlog::$end_time' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"end_time","nullable"=>true,"dbType"=>"timestamp")
  ),
  'models\\Phinxlog::$breakpoint' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"breakpoint","nullable"=>false,"dbType"=>"tinyint(1)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "isBool","constraints"=>array("notNull"=>true))
  ),
);

