<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Test' => 
  array (
  ),
),
  'models\\Test' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'test')
  ),
  'models\\Test::$idtest' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"idtest","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Test::$idprod' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"idprod","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
);

