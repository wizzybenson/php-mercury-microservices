<?php
namespace controllers;

use models\Priviledges;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
/**
 * Rest Controller RestPriviledgesController
 * @route("/rest/priviledges","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Priviledges")
 */
class RestPriviledgesController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addPriv(){
        $priv = new Priviledges();
        URequest::setPostValuesToObject($priv);
        if(DAO::insert($priv)){
            echo $this->_getResponseFormatter()->getOne($priv);
        }else{
            echo "Error : privilege not inserted!";
        }
    }

    /**
     * @route("methods"=>["put"])
     */
    public function updatePriv(){
        $values = URequest::getInput();
        $priv = DAO::getOne($this->model, $values['idPriv']);
        if($priv != null){
            URequest::setValuesToObject($priv, $values);
            if(DAO::update($priv)){
                echo $this->_getResponseFormatter()->getOne($priv);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : priviledge not Found!";
        }
    }
}
