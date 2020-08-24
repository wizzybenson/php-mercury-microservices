<?php
namespace controllers;

use models\Catalog;
use models\CatalogProduct;
use models\Customer;
use models\Product;
use Ubiquity\controllers\rest\RestBaseController;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller CatalogController
 * @route("/rest/catalogs","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\\Catalog")
 */
class CatalogController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/getAllCat","methods"=>["get"])
     */
    public function getAllCat()
    {
        $cat= new Catalog;
        $cs=$cat->getAllCat();
        echo $this->_getResponseFormatter()->get($cs);
    }
    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
    public function getById($id)
    {
        $cat= new Catalog;
        $cs=$cat->getByID($id);
        echo $cs;
    }

    /**
     * @route("/addCatalog","methods"=>["post"])
     */
    public function addCatalog()
    {
        $cat= new Catalog;
        URequest::setPostValuesToObject($cat);
        if($cat->addCatalog())
            echo json_encode(["status"=>"OK 200","title"=>"Catalog added"]);
        else
            echo json_encode(["status"=>"OK 200","title"=>"Error adding !"]);
    }

    /**
     * @route("/deleteCatalog/{id}","methods"=>["delete"])
     */
    public function deleteCatalog($id)
    {
        if(DAO::getById(Catalog::class,$id))
        {
            if(Catalog::deleteCatalog($id))
                echo json_encode(["status"=>"OK 200","title"=>"Catalog deleted"]);
            else
                echo json_encode(["status"=>"OK 200","title"=>"Error deleting !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"Catalog $id does not exist !"]);
    }


    /**
     * @route("/ajouterProdToCatalog/","methods"=>["post"])
     */
    public function AddProductToCatalog()
    {
        $cat= new CatalogProduct();


        $cat->setCatalog(URequest::getDatas()["catalog"]);
        $cat->setProduct(URequest::getDatas()["product"]);
        //echo $cat->getProduct();

        if(CatalogProduct::add($cat))
            echo json_encode(["status"=>"OK 200","title"=>"Product added in catalog"]);
        else
            echo json_encode(["status"=>"OK 200","title"=>"Error adding Product to catalog!"]);
        /*$catpro->setProduct($js->product);
        $catpro->setCatalog($js->catalog);
        $catpro->setId(111);*/
       // $cat->AddProductToCatalog();

        //echo $cs;
    }
    /**
     * @route("/updateCatalog","methods"=>["patch"])
     */
    public function updateCatalog()
    {
        if(DAO::getById(Catalog::class,URequest::getDatas()["id"]))
        {
            if(Catalog::updateCatalog())
                echo json_encode(["status"=>"OK 200","title"=>"Catalog updated"]);
            else
                echo json_encode(["status"=>"OK 200","title"=>"Error updating !"]);
        }else
        {
            echo json_encode(["status"=>"404","title"=>"Catalog ".URequest::getDatas()["id"]." does not exist !"]);
        }
    }
    /**
     * @route("/getbyguzzle31","methods"=>["get"])
     */
    public function getbyguzzle()
    {
        //$cats=DAO::getAll(Catalog::class,['libelle','details']);
        $cats= DAO::getAll(Product::class,'Product.id = CatalogProduct.product and CatalogProduct.catalog=1',false);

        foreach($cats as $cat){
            echo $cat;
        }
    }

    /**
     * @route("/addCatalog2","methods"=>["post"])
     */
    public function addCatalog2()
    {
        $cat= new Catalog;
        if($cat->addCatalog())
           echo 'Catalog added';
        else
           echo 'Error adding !';
    }

}
