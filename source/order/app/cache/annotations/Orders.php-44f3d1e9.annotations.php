<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Orders' => 
  array (
  ),
),
  'models\\Orders' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'orders')
  ),
  'models\\Orders::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Orders::$cart_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"cart_id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders::$payment_method_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"payment_method_id","nullable"=>false,"dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders::$billing_address' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_address","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$billing_address_app' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_address_app","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$billing_city' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_city","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$billing_state' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_state","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$billing_zip_code' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_zip_code","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$billing_country' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_country","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_address' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_address","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_address_app' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_address_app","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_city' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_city","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_state' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_state","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_zip_code' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_zip_code","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$shipping_country' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_country","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$date_order_placed' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_order_placed","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Orders::$date_order_paid' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_order_paid","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Orders::$date_shipped' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_shipped","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Orders::$order_total' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_total","nullable"=>false,"dbType"=>"float"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notNull")
  ),
  'models\\Orders::$order_note' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_note","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Orders::$order_status' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_status","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
);

