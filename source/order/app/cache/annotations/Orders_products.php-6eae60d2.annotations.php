<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Orders_products' => 
  array (
  ),
),
  'models\\Orders_products' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'orders_products')
  ),
  'models\\Orders_products::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Orders_products::$order_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders_products::$product_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"product_id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders_products::$quantity' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"quantity","nullable"=>false,"dbType"=>"float"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders_products::$discount' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"discount","nullable"=>false,"dbType"=>"float"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
);

