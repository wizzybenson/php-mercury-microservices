<?php

return array(
  '#namespace' => 'Ubiquity\\controllers\\admin',
  '#uses' => array (
  'BaseWidget' => 'Ajax\\common\\html\\BaseWidget',
  'JsUtils' => 'Ajax\\php\\ubiquity\\JsUtils',
  'Rule' => 'Ajax\\semantic\\components\\validation\\Rule',
  'Direction' => 'Ajax\\semantic\\html\\base\\constants\\Direction',
  'HtmlMessage' => 'Ajax\\semantic\\html\\collections\\HtmlMessage',
  'HtmlFormFields' => 'Ajax\\semantic\\html\\collections\\form\\HtmlFormFields',
  'HtmlFormInput' => 'Ajax\\semantic\\html\\collections\\form\\HtmlFormInput',
  'HtmlMenu' => 'Ajax\\semantic\\html\\collections\\menus\\HtmlMenu',
  'HtmlButton' => 'Ajax\\semantic\\html\\elements\\HtmlButton',
  'HtmlButtonGroups' => 'Ajax\\semantic\\html\\elements\\HtmlButtonGroups',
  'HtmlHeader' => 'Ajax\\semantic\\html\\elements\\HtmlHeader',
  'HtmlInput' => 'Ajax\\semantic\\html\\elements\\HtmlInput',
  'HtmlList' => 'Ajax\\semantic\\html\\elements\\HtmlList',
  'HtmlDropdown' => 'Ajax\\semantic\\html\\modules\\HtmlDropdown',
  'HtmlCheckbox' => 'Ajax\\semantic\\html\\modules\\checkbox\\HtmlCheckbox',
  'CacheManager' => 'Ubiquity\\cache\\CacheManager',
  'Controller' => 'Ubiquity\\controllers\\Controller',
  'Router' => 'Ubiquity\\controllers\\Router',
  'Startup' => 'Ubiquity\\controllers\\Startup',
  'ControllerAction' => 'Ubiquity\\controllers\\admin\\popo\\ControllerAction',
  'MailerClass' => 'Ubiquity\\controllers\\admin\\popo\\MailerClass',
  'MailerQueuedClass' => 'Ubiquity\\controllers\\admin\\popo\\MailerQueuedClass',
  'MaintenanceMode' => 'Ubiquity\\controllers\\admin\\popo\\MaintenanceMode',
  'Route' => 'Ubiquity\\controllers\\admin\\popo\\Route',
  'CacheTrait' => 'Ubiquity\\controllers\\admin\\traits\\CacheTrait',
  'ComposerTrait' => 'Ubiquity\\controllers\\admin\\traits\\ComposerTrait',
  'ConfigPartTrait' => 'Ubiquity\\controllers\\admin\\traits\\ConfigPartTrait',
  'ConfigTrait' => 'Ubiquity\\controllers\\admin\\traits\\ConfigTrait',
  'ControllersTrait' => 'Ubiquity\\controllers\\admin\\traits\\ControllersTrait',
  'CreateControllersTrait' => 'Ubiquity\\controllers\\admin\\traits\\CreateControllersTrait',
  'DatabaseTrait' => 'Ubiquity\\controllers\\admin\\traits\\DatabaseTrait',
  'GitTrait' => 'Ubiquity\\controllers\\admin\\traits\\GitTrait',
  'LogsTrait' => 'Ubiquity\\controllers\\admin\\traits\\LogsTrait',
  'MailerTrait' => 'Ubiquity\\controllers\\admin\\traits\\MailerTrait',
  'MaintenanceTrait' => 'Ubiquity\\controllers\\admin\\traits\\MaintenanceTrait',
  'ModelsConfigTrait' => 'Ubiquity\\controllers\\admin\\traits\\ModelsConfigTrait',
  'ModelsTrait' => 'Ubiquity\\controllers\\admin\\traits\\ModelsTrait',
  'OAuthTrait' => 'Ubiquity\\controllers\\admin\\traits\\OAuthTrait',
  'RestTrait' => 'Ubiquity\\controllers\\admin\\traits\\RestTrait',
  'RoutesTrait' => 'Ubiquity\\controllers\\admin\\traits\\RoutesTrait',
  'SeoTrait' => 'Ubiquity\\controllers\\admin\\traits\\SeoTrait',
  'ThemesTrait' => 'Ubiquity\\controllers\\admin\\traits\\ThemesTrait',
  'TranslateTrait' => 'Ubiquity\\controllers\\admin\\traits\\TranslateTrait',
  'CRUDDatas' => 'Ubiquity\\controllers\\crud\\CRUDDatas',
  'HasModelViewerInterface' => 'Ubiquity\\controllers\\crud\\interfaces\\HasModelViewerInterface',
  'ModelViewer' => 'Ubiquity\\controllers\\crud\\viewers\\ModelViewer',
  'InsertJqueryTrait' => 'Ubiquity\\controllers\\semantic\\InsertJqueryTrait',
  'MessagesTrait' => 'Ubiquity\\controllers\\semantic\\MessagesTrait',
  'LoggerParams' => 'Ubiquity\\log\\LoggerParams',
  'DAO' => 'Ubiquity\\orm\\DAO',
  'OrmUtils' => 'Ubiquity\\orm\\OrmUtils',
  'AdminScaffoldController' => 'Ubiquity\\scaffolding\\AdminScaffoldController',
  'ThemesManager' => 'Ubiquity\\themes\\ThemesManager',
  'TranslatorManager' => 'Ubiquity\\translation\\TranslatorManager',
  'UbiquityUtils' => 'Ubiquity\\utils\\UbiquityUtils',
  'UArray' => 'Ubiquity\\utils\\base\\UArray',
  'UFileSystem' => 'Ubiquity\\utils\\base\\UFileSystem',
  'UString' => 'Ubiquity\\utils\\base\\UString',
  'URequest' => 'Ubiquity\\utils\\http\\URequest',
  'UResponse' => 'Ubiquity\\utils\\http\\UResponse',
  'ClassToYuml' => 'Ubiquity\\utils\\yuml\\ClassToYuml',
  'ClassesToYuml' => 'Ubiquity\\utils\\yuml\\ClassesToYuml',
  'OAuthAdmin' => 'Ubiquity\\client\\oauth\\OAuthAdmin',
  'HtmlLabel' => 'Ajax\\semantic\\html\\elements\\HtmlLabel',
),
  '#traitMethodOverrides' => array (
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController' => 
  array (
  ),
),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::$adminData' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'CRUDDatas')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::$adminViewer' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'UbiquityMyAdminViewer')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::$adminFiles' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'UbiquityMyAdminFiles')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::$adminModelViewer' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'ModelViewer')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::$scaffold' => array(
    array('#name' => 'var', '#type' => 'mindplay\\annotations\\standard\\VarAnnotation', 'type' => 'AdminScaffoldController')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::_diagramMenu' => array(
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'url'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'params'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'responseElement'),
    array('#name' => 'param', '#type' => 'mindplay\\annotations\\standard\\ParamAnnotation', 'type' => 'string', 'name' => 'type'),
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'HtmlMenu')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::_getAdminData' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'CRUDDatas')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::_getModelViewer' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'ModelViewer')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::_getAdminViewer' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'UbiquityMyAdminViewer')
  ),
  'Ubiquity\\controllers\\admin\\UbiquityMyAdminBaseController::_getFiles' => array(
    array('#name' => 'return', '#type' => 'mindplay\\annotations\\standard\\ReturnAnnotation', 'type' => 'UbiquityMyAdminFiles')
  ),
);

