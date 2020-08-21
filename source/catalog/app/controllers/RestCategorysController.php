<?php
namespace controllers;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use models\Category;
use Ubiquity\controllers\Router;
/**
 * Rest Controller RestCategorysController
 * @route("/rest/categorys","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Category")
 */
class RestCategorysController extends \Ubiquity\controllers\rest\RestController {
/*
    /**
     * @route("/getAllCat","methods"=>["get"])
     */
  /*  public function getAllCat()
    {
        $cat= new Category;
        $cs=$cat->getAllCat();
        echo $this->_getResponseFormatter()->get($cs);
    }
    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
 /*   public function getById($id)
    {
        $cat= new Category;
        $cs=$cat->getByID($id);
        echo $cs;
    }

    /**
     * @route("/addCategory","methods"=>["post"])
     */
  /*  public function addCategory()
    {
        $cat= new Category;
        $cs=$cat->addCategory();
        return $cs;
    }

    /**
     * @route("/deleteCategory/{id}","methods"=>["delete"])
     */
  /*  public function deleteCategory($id)
    {
        $cat= new Category;
        $cs=$cat->deleteCategory($id);
        return $cs;
    }
*/
}
