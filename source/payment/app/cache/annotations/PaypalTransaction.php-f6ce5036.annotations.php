<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'models\\PaypalTransaction' => 
  array (
  ),
),
  'models\\PaypalTransaction' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"paypal_transactions")
  ),
  'models\\PaypalTransaction::$paypaltransactionid' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation'),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\ValidatorAnnotation', "id","constraints"=>array("autoinc"=>true))
  ),
  'models\\PaypalTransaction::$paypal_account' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\PaypalAdmin","name"=>"paypal_id","nullable"=>false)
  ),
  'models\\PaypalTransaction::$payer' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\PayerPaypal","name"=>"payerid","nullable"=>false)
  ),
);

