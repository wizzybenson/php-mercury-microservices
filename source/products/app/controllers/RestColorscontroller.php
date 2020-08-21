<?php
namespace controllers;

use models\Colors;

/**
 * Rest Controller RestColorscontroller
 * @route("/rest/colors","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Colors")
 */
class RestColorscontroller extends \Ubiquity\controllers\rest\RestController {

    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addColor(){
        $color = new Colors();
        URequest::setPostValuesToObject($color);
        if(DAO::insert($color)){
            echo $this->_getResponseFormatter()->getOne($color);
        }else{
            echo "Error : color not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updateColor(){
        $values = URequest::getInput();
        $ColorClass = DAO::getOne($this->model, $values['idcolor']);
        if($ColorClass != null){
            URequest::setValuesToObject($ColorClass, $values);
            if(DAO::update($ColorClass)){
                echo $this->_getResponseFormatter()->getOne($ColorClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : color not Found!";
        }
    }

    /**
     * @authorization
     * @param array $keyValues
     * @route("/remove/{keyValues}", "methods"=>["delete"])
     */
    public function remove($keyValues){
        if(Colors::delete($keyValues))
            echo "color removed from database";
        else
            echo "Error removing !";
    }

    /**
     * @route("methods"=>["patch"])
     */
    public function updateStatus(){
        $values = URequest::getInput();
        $ColorClass = DAO::getOne($this->model, $values['idcolor']);
        if($ColorClass != null){
            URequest::setValuesToObject($ColorClass, $values);
            if(DAO::update($ColorClass)){
                echo $this->_getResponseFormatter()->getOne($ColorClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : color not Found!";
        }
    }

}
