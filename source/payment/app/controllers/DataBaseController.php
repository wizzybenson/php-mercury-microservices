<?php
namespace controllers;

/**
 * Rest Controller DataBaseController
 * @route("/payments/database","inherited"=>false,"automated"=>true)
 * @rest("resource"=>"models\DataBase")
 */
class DataBaseController extends \Ubiquity\controllers\rest\RestController {
    private $database = null;
    /**
     * @route("/change", "methods"=>["get"])
     */
    public function change(){
        $direname = dirname(dirname(dirname(__FILE__)));
        ob_start();
        include($direname . '/database/base.sql');
        $content = ob_get_contents();
        ob_end_clean();
        // ------------------------ Creation of database --------------------------
        try{
            $server = new \PDO('mysql:host=localhost','root','', [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
        }catch(\PDOexception $e){}
        $server->query("DROP DATABASE paymentdb");
        $server->query("CREATE DATABASE paymentdb");
        try{
            $this->database = new \PDO('mysql:host=localhost; dbname=paymentdb','root','', [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']);
        }catch(\PDOexception $e){}
        // ------------ Creation of tables & insertion of lines -------------
        preg_replace_callback('#(CREATE|create)(.*?)\;#si', 'self::createTables', $content);
        preg_replace_callback('#(INSERT|insert)(.*?)\;#si', 'self::insertLines', $content);
        preg_replace_callback('#(ALTER|alter)(.*?);#si', 'self::alterTables', $content);
        echo $this->_getResponseFormatter()->format(["database" => "database created","tables" => "tables created", "lines" => "lines inserted", "tables" => "tables altred"]);
    }
    private function createTables($querie){
        $theQuery = str_replace("\n", " ", $querie[0]);
        $this->database->query($theQuery);
    }
    private function insertLines($querie){
        $theQuery = str_replace("\n", " ", $querie[0]);
        $this->database->query($theQuery);
    }
    private function alterTables($querie){
        $theQuery = str_replace("\n", " ", $querie[0]);
        $this->database->query($theQuery);
    }
}
