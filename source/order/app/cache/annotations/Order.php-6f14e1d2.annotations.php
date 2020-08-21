<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAOException' => 'Ubiquity\\exceptions\\DAOException',
  'DAO' => 'Ubiquity\\orm\\DAO',
<<<<<<< HEAD
=======
  'Client' => 'GuzzleHttp\\Client',
>>>>>>> upstream/master
),
  '#traitMethodOverrides' => array (
  'models\\Order' => 
  array (
  ),
),
  'models\\Order' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'order')
  ),
  'models\\Order::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"id","nullable"=>false,"dbType"=>"int"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Order::$cart_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"cart_id","nullable"=>true,"dbType"=>"int")
  ),
  'models\\Order::$payment_id' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"payment_id","nullable"=>true,"dbType"=>"int")
  ),
  'models\\Order::$billing_address' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_address","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$billing_address_app' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_address_app","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$billing_city' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_city","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$billing_state' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_state","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$billing_zip_code' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_zip_code","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$billing_country' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"billing_country","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_address' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_address","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_address_app' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_address_app","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_city' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_city","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_state' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_state","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_zip_code' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_zip_code","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$shipping_country' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"shipping_country","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$date_order_placed' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_order_placed","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Order::$date_order_paid' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_order_paid","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Order::$date_shipped' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"date_shipped","nullable"=>false,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "type","dateTime","constraints"=>array("notNull"=>true))
  ),
  'models\\Order::$order_note' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_note","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$order_status' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\ColumnAnnotation', "name"=>"order_status","nullable"=>false,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "length","constraints"=>array("max"=>255,"notNull"=>true))
  ),
  'models\\Order::$refunds' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"order","className"=>"models\\Refund")
  ),
  'models\\Order::$coupons' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"order","className"=>"models\\Coupon")
  ),
);

