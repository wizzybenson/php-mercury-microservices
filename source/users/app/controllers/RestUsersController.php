<?php
namespace controllers;

use models\User;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
/**
 * Rest Controller RestUsersController
 * @route("/rest/users","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\User")
 */
class RestUsersController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addUser(){
        $userte = new User();
        URequest::setPostValuesToObject($userte);
        if(DAO::insert($userte)){
            echo $this->_getResponseFormatter()->getOne($userte);
        }else{
            echo "Error : User not inserted!";
        }
    }

    /**
     * @route("methods"=>["put"])
     */
    public function updateUser(){
        $values = URequest::getInput();
        $userte = DAO::getOne($this->model, $values['idUser']);
        if($userte != null){
            URequest::setValuesToObject($userte, $values);
            if(DAO::update($userte)){
                echo $this->_getResponseFormatter()->getOne($userte);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : User not Found!";
        }
    }
}
