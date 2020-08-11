<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\CostumorPayment' => 
  array (
  ),
),
  'models\\CostumorPayment' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"costumors_payments")
  ),
  'models\\CostumorPayment::$transactionid' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\CostumorPayment::$costumorid' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\CostumorPayment::$amount' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\CostumorPayment::$transactioncode' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\CostumorPayment::$payment' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Payment","name"=>"paymentmethod","nullable"=>false)
  ),
  'models\\CostumorPayment::$paymenttransaction' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
);

