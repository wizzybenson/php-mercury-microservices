<?php
namespace models;
use GuzzleHttp\Client;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

class Catalog{
	/**
	 * @id
	 * @column("name"=>"id","nullable"=>false,"dbType"=>"int(11)")
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



    public static function fromString(Catalog $libelle): self
    {
        return ($libelle);
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
    public function addCatalog(){
        $cat= new Catalog;
        /* $cat->setLibelle("KHALKI Add");
         $cat->setDetails("KHALKI Details Add");
         $cat->setImage("KHALKI im");
         $cat->setDatec("2020-03-04 00:00:00");*/
        URequest::setPostValuesToObject($cat);
        if(DAO::insert($cat)) {
            echo true;
        }else
        {
            echo false;
        }
    }
    public function addCatalog2(Catalog $cat){
        DAO::save($cat);
    }

    public function deleteCatalog($id){
        $cat= new Catalog;
        $cat=DAO::getOne(Catalog::class,$id,false);
        if(DAO::remove($cat)) {
            echo true;
        }else
        {
            echo false;
        }
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

}