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
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', "name"=>"payment")
  ),
  'models\\Payment::$paymentid' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\IdAnnotation')
  ),
  'models\\Payment::getPaymentid' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setPaymentid' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'paymentid')
  ),
  'models\\Payment::getUrl' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setUrl' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'url')
  ),
  'models\\Payment::getTitle' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setTitle' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'title')
  ),
  'models\\Payment::getDescription' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setDescription' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'description')
  ),
  'models\\Payment::getImage' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setImage' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'image')
  ),
  'models\\Payment::getStatus' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'mixed')
  ),
  'models\\Payment::setStatus' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'mixed', 'name' => 'status')
  ),
);

