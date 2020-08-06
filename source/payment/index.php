<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS.'app'.DS);
$config=include_once ROOT.'config/config.php';
require_once ROOT.'./../vendor/autoload.php';
require_once ROOT.'config/services.php';
\Ubiquity\controllers\Startup::run($config);
try{
   $database = new PDO('mysql:host=microservice_payment_database','root','mysecret', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
}catch(PDOexception $e){
   exit('<h1 style="text-align:center; color: #CC0000; margin-top: 15px">DataBase Error</h1>');
}
$database->exec("CREATE DATABASE paymentdb IF NOT EXISTS");
?>
