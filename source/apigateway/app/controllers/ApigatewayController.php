<?php
namespace controllers;
use Ubiquity\utils\http\URequest;
use res\SenderClass;
/**
 * Controller ApigatewayController
  * @route("/apigateway","inherited"=>true,"automated"=>true)
 **/
class ApigatewayController extends \Ubiquity\controllers\rest\RestController{

    private $sender;

    public function __construct()
    {
        $this->sender = new SenderClass();
    }

    /**
     * @route("/{uri}")
     */
    public function send($uri)
    {
        $this->sender->send($uri, json_encode(URequest::getDatas()));
    }
}
