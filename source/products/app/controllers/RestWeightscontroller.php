<?php
namespace controllers;

use models\Weights;

/**
 * Rest Controller RestWeightscontroller
 * @route("/rest/weights","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Weights")
 */
class RestWeightscontroller extends \Ubiquity\controllers\rest\RestController {

    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addWeight(){
        $weight = new Weights();
        URequest::setPostValuesToObject($weight);
        if(DAO::insert($weight)){
            echo $this->_getResponseFormatter()->getOne($weight);
        }else{
            echo "Error : weight not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updateWeight(){
        $values = URequest::getInput();
        $weightClass = DAO::getOne($this->model, $values['idweight']);
        if($weightClass != null){
            URequest::setValuesToObject($weightClass, $values);
            if(DAO::update($weightClass)){
                echo $this->_getResponseFormatter()->getOne($weightClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : weight not Found!";
        }
    }

    /**
     * @authorization
     * @param array $keyValues
     * @route("/remove/{keyValues}", "methods"=>["delete"])
     */
    public function remove($keyValues){
        if(Weights::delete($keyValues))
            echo "weight removed from database";
        else
            echo "Error removing !";
    }

    /**
     * @route("methods"=>["patch"])
     */
    public function updateStatus(){
        $values = URequest::getInput();
        $weightClass = DAO::getOne($this->model, $values['idweight']);
        if($weightClass != null){
            URequest::setValuesToObject($weightClass, $values);
            if(DAO::update($weightClass)){
                echo $this->_getResponseFormatter()->getOne($weightClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : weight not Found!";
        }
    }

}
