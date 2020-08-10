<?php
namespace controllers;

use models\Sizes;

/**
 * Rest Controller RestSizescontroller
 * @route("/rest/sizes","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Sizes")
 */
class RestSizescontroller extends \Ubiquity\controllers\rest\RestController {

    /**
     * @route("methods"=>["get"])
     */
    public function getAll(){
        parent::get();
    }
    /**
     * @route("methods"=>["post"])
     */
    public function addSize(){
        $size = new Sizes();
        URequest::setPostValuesToObject($size);
        if(DAO::insert($size)){
            echo $this->_getResponseFormatter()->getOne($size);
        }else{
            echo "Error : size not inserted!";
        }
    }
    /**
     * @route("methods"=>["put"])
     */
    public function updateSize(){
        $values = URequest::getInput();
        $sizeClass = DAO::getOne($this->model, $values['idsize']);
        if($sizeClass != null){
            URequest::setValuesToObject($sizeClass, $values);
            if(DAO::update($sizeClass)){
                echo $this->_getResponseFormatter()->getOne($sizeClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : size not Found!";
        }
    }

    /**
     * @authorization
     * @param array $keyValues
     * @route("/remove/{keyValues}", "methods"=>["delete"])
     */
    public function remove($keyValues){
        if(Sizes::delete($keyValues))
            echo "size removed from database";
        else
            echo "Error removing !";
    }

    /**
     * @route("methods"=>["patch"])
     */
    public function updateStatus(){
        $values = URequest::getInput();
        $sizeClass = DAO::getOne($this->model, $values['idsize']);
        if($sizeClass != null){
            URequest::setValuesToObject($sizeClass, $values);
            if(DAO::update($sizeClass)){
                echo $this->_getResponseFormatter()->getOne($sizeClass);
            }else{
                echo "Error : data not modified!";
            }
        }else{
            echo "Error : size not Found!";
        }
    }

}
