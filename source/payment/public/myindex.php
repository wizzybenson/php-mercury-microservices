<?php
$web = false;
$db = null;
try{
$database = new PDO('mysql:host=localhost; dbname=mypayment','root','123456789', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
}catch(PDOexception $e){
	die('<h1 style="text-align:center; color: #CC0000; margin-top: 15px">Erreur base de donnée</h1>');
}
echo 'hello';
?>
bgrtbhrthbrt
