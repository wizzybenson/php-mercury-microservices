<?php
namespace controllers;

use http\Env\Response;
use http\Message\Body;

/**
 * Rest Controller RestCostumerController
 * @route("/rest/customers","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Customer")
 */
class RestCostumerController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/tester", "methods"=>["get"])
     */
    public function tester() {
        $response = new Response("hello i am a test response");
        $body = new Body("hello i am the body");
        $response->setBody($body);
       echo json_encode($response);
    }
}
