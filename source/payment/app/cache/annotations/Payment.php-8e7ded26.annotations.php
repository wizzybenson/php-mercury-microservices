<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Payment' => 
  array (
  ),
),
  'models\\Payment' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"payments")
  ),
  'models\\Payment::$paymentid' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\Payment::$url' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\Payment::$title' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\Payment::$image' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "notEmpty")
  ),
  'models\\Payment::$status' => array(
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "isBool")
  ),
  'models\\Payment::$transactions' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\OneToManyAnnotation', "mappedBy"=>"tikakaka","className"=>"models\\CostumorPayment")
  ),
  'models\\Payment::setPaymentid' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'models\\Payment::setUrl' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'models\\Payment::setTitle' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'models\\Payment::setDescription' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'models\\Payment::setImage' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
  'models\\Payment::setStatus' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'self')
  ),
);

