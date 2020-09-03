<?php
namespace models;
use controllers\CatalogController;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Integer;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;
use Ubiquity\utils\http\UResponse;
class Catalog{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int")
	 * @validator("id","constraints"=>array("autoinc"=>true))
	**/
	private $id;

	/**
	 * @column("name"=>"libelle","nullable"=>false,"dbType"=>"varchar(200)")
	 * @validator("length","constraints"=>array("max"=>200,"notNull"=>true))
	**/
	private $libelle;

	/**
	 * @column("name"=>"details","nullable"=>false,"dbType"=>"varchar(150)")
	 * @validator("length","constraints"=>array("max"=>150,"notNull"=>true))
	**/
	private $details;

	/**
	 * @column("name"=>"image","nullable"=>false,"dbType"=>"varchar(20)")
	 * @validator("length","constraints"=>array("max"=>20,"notNull"=>true))
	**/
	private $image;

	/**
	 * @column("name"=>"etat","nullable"=>false,"dbType"=>"tinyint(1)")
	 * @validator("isBool","constraints"=>array("notNull"=>true))
	**/
	private $etat;

	/**
	 * @column("name"=>"datec","nullable"=>false,"dbType"=>"datetime")
	 * @validator("type","dateTime","constraints"=>array("notNull"=>true))
	**/
	private $datec;

	/**
	 * @oneToMany("mappedBy"=>"catalog","className"=>"models\\CatalogProduct")
	**/
	private $catalogProducts;

	 public function getId(){
		return $this->id;
	}

	 public function setId($id){
		$this->id=$id;
	}

	 public function getLibelle(){
		return $this->libelle;
	}

	 public function setLibelle($libelle){
		$this->libelle=$libelle;
	}

	 public function getDetails(){
		return $this->details;
	}

	 public function setDetails($details){
		$this->details=$details;
	}

	 public function getImage(){
		return $this->image;
	}

	 public function setImage($image){
		$this->image=$image;
	}

	 public function getEtat(){
		return $this->etat;
	}

	 public function setEtat($etat){
		$this->etat=$etat;
	}

	 public function getDatec(){
		return $this->datec;
	}

	 public function setDatec($datec){
		$this->datec=$datec;
	}

	 public function getCatalogProducts(){
		return $this->catalogProducts;
	}

	 public function setCatalogProducts($catalogProducts){
		$this->catalogProducts=$catalogProducts;
	}

	 public function __toString(){
	//	return ($this->id??'no value').'';
		return $this->id;
	}
    /* public function __toString(){
            return ('{"data": [{"id":"'.$this->getId().'","libelle":"'.$this->getLibelle().'","details":"'.$this->getDetails().'","image":"'.$this->getDetails().'","datec":"'.$this->getDatec().'"}]}'??'no value').'';
        }*/
    public function validate($libelle){
        return ($libelle);
    }
    public function getAllCat(){

        $cs=DAO::getAll(Catalog::class);

        return $cs;
    }
    public function getByID($id){

        $cs=DAO::getById(Catalog::class,$id);
        return json_encode($cs);
    }

    public function getActiveCat(){

        $cs=DAO::getAll(Catalog::class,'etat=1',false);
        return $cs;
    }

    public function getDesactiveCat(){

        $cs=DAO::getAll(Catalog::class,'etat=0',false);
        return $cs;
    }

    public function ChangeetatAllCat($id,$et){

        $cat = DAO::getOne(Catalog::class,'id='.$id);
        $cat->setEtat($et);
        return DAO::update($cat);
    }

    public function CatalogSize($id){

        $cs=DAO::getAll(CatalogProduct::class,'catalog='.$id,false);
        return sizeof($cs);
    }

    public function addCatalog(){
        if(DAO::insert($this))
            return true;
        else
            return false;
    }
    public function addCatalog2(Catalog $cat){
        DAO::save($cat);
    }

    public function deleteCatalog($id){
        $cat= new Catalog;
        $cat=DAO::getOne(Catalog::class,$id,false);
        if(DAO::remove($cat))
            echo true;
        else
            echo false;
    }

    public function deletebyCatalog($id)
    {
        $cs=DAO::deleteAll(CatalogProduct::class,'catalog ='.$id,false);
        return $cs;
    }

    public static function sendRequest($token,$method='GET', $endpoint, $filterBy='', $body=''){
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer' . $token,
            'Accept' => 'application/json'
        ];
        $ep = $endpoint . '' . $filterBy;
        $response = $client->request($method, $ep, ['Headers'=>$headers]);
        return $response;
    }
    public function updateCatalog(){
        $cat= new Catalog;
        $cat->setId(URequest::getDatas()["id"]);
        $cat->setLibelle(URequest::getDatas()["libelle"]);
        $cat->setDetails(URequest::getDatas()["details"]);
        $cat->setImage(URequest::getDatas()["image"]);
        $cat->setDatec(URequest::getDatas()["datec"]);
        if(DAO::update($cat)) {
            return true;
        }else
        {
            return false;
        }
    }


}