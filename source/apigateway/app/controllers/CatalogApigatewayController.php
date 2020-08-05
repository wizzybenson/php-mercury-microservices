<?php
namespace controllers;
use GuzzleHttp\Client;
use models\Catalog;
use models\CatalogProduct;
use Ubiquity\utils\http\URequest;

/**
 * Controller CatalogApigatewayController
  * @route("/rest/catalogs","inherited"=>true,"automated"=>true)
 **/
class CatalogApigatewayController extends \Ubiquity\controllers\rest\RestController{


    /**
     * @route("/Test","methods"=>["get"])
     */
    public function Test()
    {
        echo "Test";
    }

    /**
     * @route("/connectCat","methods"=>["get"])
     */
    public function connect()
    {
        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]);
        $response = $client->request('GET', 'http://microservice_catalog_nginx/rest/catalogs/connect/');
        echo substr($response->getBody(),17,20);
    }

    /**
     * @route("/connectCatProd","methods"=>["get"])
     */
    public function connectCotalogProduct()
    {
        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]);
        $response = $client->request('GET', 'http://microservice_catalog_nginx/rest/catalogproducts/connect/');
        echo substr($response->getBody(),17,20);
    }

    /**
     * @route("/getAllCat","methods"=>["get"])
     */
    public function getAllCat()
    {
        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]);
        $response = $client->request('GET', 'http://microservice_catalog_nginx/rest/catalogs/getAllCat/');

        // echo $response->getStatusCode();echo $response->getHeaderLine('content-type');
        echo $response->getBody();
    }

    /**
     * @route("/getById/{id}","methods"=>["get"])
     */
    public function getById($id)
    {
        $client = new Client([
            //'debug' => true,
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]) ;
        $response = $client->request('GET','http://microservice_catalog_nginx/rest/catalogs/getById/'.$id);
        echo $response->getBody();
    }

    /**
     * @route("/deleteCatalog/{id}","methods"=>["delete"])
     */
    public function deleteCatalog($id)
    {
        $client = new Client([
            //'debug' => true,
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Accept' => 'application/json; charset=utf-8'
            ]
        ]) ;

        $response = $client->delete('http://microservice_catalog_nginx/rest/catalogs/deleteCatalog/'.$id);
        echo $response->getStatusCode();
    }

    /**
     * @route("/addCatalog","methods"=>["post"])
     */
    public function addCatalog()
    {
        $token=$this->connect();
        $cat= new Catalog;
        $cat->setLibelle(URequest::get("libelle"));
        $cat->setDetails(URequest::get("details"));
        $cat->setImage(URequest::get("image"));
        $cat->setDatec(URequest::get("datec"));

        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Authorization' => 'Bearer'.$token ,
                'Accept' => 'application/json; charset=utf-8'
            ],
            'form_params' => [
                'libelle' => $cat->getLibelle(),
                'details' => $cat->getDetails(),
                'image' => $cat->getImage(),
                'datec' => $cat->getDatec()
            ]
        ]) ;


        $response = $client->request('POST', 'http://microservice_catalog_nginx/rest/catalogs/addCatalog/');
        echo $response->getBody();
    }
    /**
     * @route("/updateCatalog","methods"=>["patch"])
     */
    public function updateCatalog()
    {
        $token=$this->connect();
        $cat= new Catalog;
        $cat->setId(URequest::get("id"));
        $cat->setLibelle(URequest::get("libelle"));
        $cat->setDetails(URequest::get("details"));
        $cat->setImage(URequest::get("image"));
        $cat->setDatec(URequest::get("datec"));
        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Authorization' => 'Bearer '.$token ,
                'Accept' => 'application/json; charset=utf-8'
            ],
            'form_params' => [
                'id' => $cat->getLibelle(),
                'libelle' => $cat->getLibelle(),
                'details' => $cat->getDetails(),
                'image' => $cat->getImage(),
                'datec' => $cat->getDatec()
            ]
        ]) ;

        $response = $client->patch('http://microservice_catalog_nginx/rest/catalogs/updateCatalog/');
        echo $response->getBody();
    }
    /**
     * @route("/ajouterProdToCatalog","methods"=>["post"])
     */
    public function AddProductToCatalog()
    {
        $token=$this->connectCotalogProduct();
        $cat= new CatalogProduct();
        $cat->setCatalog(URequest::get('catalog'));
        $cat->setProduct(URequest::get('product'));
        $client = new Client([
            'base_uri' => 'http://microservice_catalog_nginx',
            'headers' => [
                'Authorization' => 'Bearer'.$token ,
                'Accept' => 'application/json; charset=utf-8'
            ],
            'form_params' => [
                'catalog' => $cat->getLibelle(),
                'product' => $cat->getDetails(),
            ]
        ]) ;

        $response = $client->request('POST', 'http://microservice_catalog_nginx/rest/catalogproducts/ajouterProdToCatalog/');
        echo $response->getBody();
    }

}
