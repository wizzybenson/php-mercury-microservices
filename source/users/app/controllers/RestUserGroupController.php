<?php
namespace controllers;


use models\Usergroupe;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
/**
 * Rest Controller RestUserGroupController
 * @route("/rest/usergroup","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Usergroupe")
 */
class RestUserGroupController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addUserGroup(){
        $group = new Usergroupe();
        URequest::setPostValuesToObject($group);
        if(DAO::insert($group)){
            echo $this->_getResponseFormatter()->getOne($group);
        }else{
            echo "Error : User Group not inserted!";
        }
    }

    /**
     * @route("methods"=>["put"])
     */
    public function updateUserGroup(){
        $values = URequest::getInput();
        $group = DAO::getOne($this->model, $values['idGroup']);
        if($group != null){
            URequest::setValuesToObject($group, $values);
            if(DAO::update($group)){
                echo $this->_getResponseFormatter()->getOne($group);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : User Group not Found!";
        }
    }
}
