<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Usergroup_priviledges' => 
  array (
  ),
),
  'models\\Usergroup_priviledges' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\TableAnnotation', 'usergroup_priviledges')
  ),
  'models\\Usergroup_priviledges::$priviledges' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Priviledges","name"=>"idPriv","nullable"=>false)
  ),
  'models\\Usergroup_priviledges::$usergroupe' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\ManyToOneAnnotation'),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\JoinColumnAnnotation', "className"=>"models\\Usergroupe","name"=>"idGroup","nullable"=>false)
  ),
);

