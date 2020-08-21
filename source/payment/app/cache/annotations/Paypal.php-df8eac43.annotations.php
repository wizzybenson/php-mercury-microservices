<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Paypal' => 
  array (
  ),
),
  'models\\Paypal' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"paypal")
  ),
  'models\\Paypal::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation')
  ),
  'models\\Paypal::getId' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Paypal::setId' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'id')
  ),
  'models\\Paypal::getActivated_compte' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Paypal::setActivated_compte' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'activated_compte')
  ),
);

