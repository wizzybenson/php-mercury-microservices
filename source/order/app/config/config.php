<?php
return array(
		"siteUrl"=>"http://127.0.0.1/orders/",
		"database"=>[
				"type"=>"mysql",
				"dbName"=>"orderdb",
				"serverName"=>"microservice_order_database",
				"port"=>"3306",
				"user"=>"root",
				"password"=>"mysecret",
				"options"=>[],
				"cache"=>false
		],
		"sessionName"=>"orders",
		"namespaces"=>[],
		"templateEngine"=>'Ubiquity\\views\\engine\\Twig',
		"templateEngineOptions"=>array("cache"=>false),
		"test"=>false,
		"debug"=>false,
		"logger"=>function(){return new \Ubiquity\log\libraries\UMonolog("orders",\Monolog\Logger::INFO);},
		"di"=>["@exec"=>["jquery"=>function($controller){
						return \Ubiquity\core\Framework::diSemantic($controller);
					}]],
		"cache"=>["directory"=>"cache/","system"=>"Ubiquity\\cache\\system\\ArrayCache","params"=>[]],
		"mvcNS"=>["models"=>"models","controllers"=>"controllers","rest"=>""],
		"isRest"=>function(){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
);
