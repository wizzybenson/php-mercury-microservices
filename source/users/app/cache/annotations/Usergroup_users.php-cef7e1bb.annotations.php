<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Usergroup_users' => 
  array (
  ),
),
  'models\\Usergroup_users' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'usergroup_users')
  ),
  'models\\Usergroup_users::$user' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idUser","nullable"=>false)
  ),
  'models\\Usergroup_users::$usergroupe' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Usergroupe","name"=>"idGroup","nullable"=>false)
  ),
);

