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

    public function send($uri, $datas){
        $routes = file_get_contents("/var/www/html/app/res/routes.json");

        $routes = json_decode($routes, true);

        foreach($routes["routes"] as $row)
        {
            $path = substr($row["path"], strlen($row["path"])*-1+7);
            $path = substr($path, strpos($path, '/')+1);
            if($path == $uri){
                try {
                    $response = $this->client->request($row["method"], $row["path"], ['body'=>(string)$datas]);
                    echo $response->getBody();
                } catch (GuzzleException $e) {//catching the error message including the error status
                    echo $e->getMessage();
                }
                break;
            }
        }
        echo 'Resource does not exist';
    }
}