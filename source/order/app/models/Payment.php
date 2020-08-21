<?php


namespace models;
use GuzzleHttp\Client;

class Payment
{
    public static function sendRequest($token='',$method='GET' , $endpoint='', $filterBy='', $body=''){
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