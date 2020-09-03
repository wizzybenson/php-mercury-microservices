<?php
namespace controllers;

use models\Catalog;
use models\CatalogProduct;
use models\Customer;
use models\Product;
use Ubiquity\controllers\rest\RestBaseController;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use function PHPUnit\Framework\lessThanOrEqual;

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
        $cs=Catalog::getAllCat();
        if($cs!=null)
            echo $this->_getResponseFormatter()->get($cs);
        else
            echo json_encode(["status"=>"404","title"=>"Table Catalog is empty !"]);
    }
    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
    public function getById($id)
    {
        $cs=Catalog::getByID($id);
        if($cs!=null)
            echo $cs;
        else
            echo json_encode(["status"=>"404","title"=>"Catalog ".$id." "]);
    }

    /**
     * @route("/getActiveCatalog","methods"=>["get"])
     */
    public function getActiveCatalog()
    {
        $cat= Catalog::getActiveCat();
        if($cat!=null)
            echo $this->_getResponseFormatter()->get($cat);
        else
            echo json_encode(["status"=>"404","title"=>"Active catalogs does not exist !"]);
    }

    /**
     * @route("/getDesactiveCatalog","methods"=>["get"])
     */
    public function getDesactiveCatalog()
    {
        $cat= Catalog::getDesactiveCat();
        if($cat!=null)
            echo $this->_getResponseFormatter()->get($cat);
        else
        {
            echo json_encode(["status"=>"404","title"=>"Desactive catalogs does not exist !"]);
        }
    }

    /**
     * @route("/getCatalogSize/{id}","methods"=>["get"])
     */
    public function getCatalogSize($id)
    {
        $cat= Catalog::CatalogSize($id);
        echo json_encode(["status"=>"404","title"=>"Catalog $id had $cat product(s)"]);
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
            Catalog::deletebyCatalog($id);
            if(Catalog::deleteCatalog($id))
                echo json_encode(["status"=>"OK 200","title"=>"Catalog deleted"]);
            else
                echo json_encode(["status"=>"OK 200","title"=>"Error deleting !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"Catalog $id does not exist !"]);
    }

    /**
     * @route("/ViderCatalog/{id}","methods"=>["delete"])
     */
    public function ViderCatalog($id)
    {
        if(DAO::getById(Catalog::class,$id))
        {
            if(DAO::getAll(CatalogProduct::class,'catalog='.$id,false))
            {
                if(Catalog::deletebyCatalog($id))
                    echo json_encode(["status"=>"OK 200","title"=>"Catalog is empty now"]);
                else
                    echo json_encode(["status"=>"OK 200","title"=>"Error emptying !"]);
            }else{
                echo json_encode(["status"=>"OK 200","title"=>"Catalog $id are already empty !"]);
            }

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
     * @route("/ActiveAllCatalog","methods"=>["patch"])
     */
    public function ActiveAllCatalog()
    {
        $cat= $this->_getResponseFormatter()->get(Catalog::getDesactiveCat());
        $size =json_decode($cat, true)["count"];

        if($size!=0)
        {
            for ($i=0; $i<$size; $i++) {
                $id=json_encode(json_decode($cat, true)["datas"][$i]["id"]);
                Catalog::ChangeetatAllCat($id,1);
            }
            echo json_encode(["status"=>"OK 200","title"=>$size." catalogs are activated !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"All catalogs are already activated !"]);
    }

    /**
     * @route("/DesactiveAllCatalog","methods"=>["patch"])
     */
    public function DesactiveAllCatalog()
    {
        $cat= $this->_getResponseFormatter()->get(Catalog::getActiveCat());
        $size =json_decode($cat, true)["count"];

        if($size!=0)
        {
            for ($i=0; $i<$size; $i++) {
                $id=json_encode(json_decode($cat, true)["datas"][$i]["id"]);
                Catalog::ChangeetatAllCat($id,0);
            }
            echo json_encode(["status"=>"OK 200","title"=>$size." catalogs are deactivated !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"All catalogs are already deactivated !"]);
    }

    /**
     * @route("/ActiveCatalog/{id}","methods"=>["patch"])
     */
    public function ActiveCatalog($id)
    {
        if(DAO::getById(Catalog::class,$id))
        {
            if(Catalog::ChangeetatAllCat($id,1))
                echo json_encode(["status"=>"OK 200","title"=>"Catalog $id activated"]);
            else
                echo json_encode(["status"=>"OK 200","title"=>"Error activing !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"Catalog $id does not exist !"]);
    }


    /**
     * @route("/DesactiveCatalog/{id}","methods"=>["patch"])
     */
    public function DesactiveCatalog($id)
    {
        if(DAO::getById(Catalog::class,$id))
        {
            if(Catalog::ChangeetatAllCat($id,0))
                echo json_encode(["status"=>"OK 200","title"=>"Catalog $id desactivated"]);
            else
                echo json_encode(["status"=>"OK 200","title"=>"Error desactiving !"]);
        }else
            echo json_encode(["status"=>"404","title"=>"Catalog $id does not exist !"]);
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
