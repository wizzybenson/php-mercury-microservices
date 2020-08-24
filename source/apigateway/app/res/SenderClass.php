<?php


namespace res;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SenderClass
{

    private $client;


    public function __construct()
    {
        $this->client = new Client();
    }
    private function isRoutesEquals($route1, $route2){
        $parts1 = explode("/", $route1);
        $parts2 = explode("/", $route2);
        if(count($parts1) != count($parts2))
            return false;
        for ($i = 1; $i < count($parts1); $i++){
            if(strpos($parts1[$i], '{')===false && $parts1[$i] !== $parts2[$i]){
                return false;
            }
        }
        return true;
    }
    public function send($uri, $datas){
        $routes = file_get_contents("/var/www/html/app/res/routes.json");
        $routes = json_decode($routes, true);
        $flag = true;
        foreach($routes["routes"] as $row)
        {
            $firstPart = substr($row["path"], strlen($row["path"])*-1+7);//trim the http part
            $path = substr($firstPart, strpos($firstPart, '/')+1);//trim the microservice server name
            if($this->isRoutesEquals($path, $uri)){//test in case of an url with parameters
                $flag = false;
                $microserviceName = substr($firstPart,0, strpos($firstPart, '/'));//get the microservice server name
                try {//send the request to the microservice

                    //send data with form_params in the case of catalog microservice
                    if($microserviceName =="microservice_catalog_nginx")
                        $this->form_params_catalog($datas,$row["method"]);

                    $response = $this->client->request($row["method"], 'http://'.$microserviceName.'/'.$uri, ['body'=>$datas]);
                    $status = json_decode($response->getBody(), true)["status"];

                    if($status != 200 && $status != null){
                        echo json_encode(["status"=>$status, "title"=>json_decode($response->getBody(), true)["title"]]);
                    }else if(json_decode($response->getBody(), true)["datas"] != null) {
                        echo $response->getBody();
                    }else {
                        echo "Error";
                    }
                } catch (GuzzleException $e) {
                    echo $e->getMessage();
                }
                break;
            }
        }
        if($flag) echo json_encode(["status"=>"404", "title"=>"resource not found"]);
    }
    public function form_params_catalog($datas,$mtd)
    {
        $dt = json_decode($datas,true);

        if($mtd==="POST")
            $this->client = new Client(['form_params' => ['libelle' => $dt[libelle],'details' => $dt[details],'image' => $dt[image],'datec' => $dt[datec]]]);
        else if($mtd==="PATCH")
            $this->client = new Client(['form_params' => ['id' => $dt[id],'libelle' => $dt[libelle],'details' => $dt[details],'image' => $dt[image],'datec' => $dt[datec]]]);
        else
            $this->client = new Client();

    }
}

