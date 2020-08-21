<?php
return array(
<<<<<<< HEAD
		"siteUrl"=>"http://127.0.0.1:8080/",
		"database"=>[
				"type"=>"mysql",
				"dbName"=>"payment",
				"serverName"=>"127.0.0.1:6672",
				"port"=>"3306",
				"user"=>"root",
				"password"=>"123456789",
				"options"=>[],
				"cache"=>false
		],
		"sessionName"=>"leprojet",
=======
		"siteUrl"=>"http://127.0.0.1/backend/",
		"database"=>[
				"type"=>"mysql",
				"dbName"=>"paymentdb",
				"serverName"=>"microservice_payment_database",
				"port"=>"3306",
				"user"=>"root",
				"password"=>"mysecret",
				"options"=>[],
				"cache"=>false
		],
		"sessionName"=>"backend",
>>>>>>> upstream/master
		"namespaces"=>[],
		"templateEngine"=>'Ubiquity\\views\\engine\\Twig',
		"templateEngineOptions"=>array("cache"=>false),
		"test"=>false,
		"debug"=>false,
<<<<<<< HEAD
		"logger"=>function(){return new \Ubiquity\log\libraries\UMonolog("leprojet",\Monolog\Logger::INFO);},
=======
		"logger"=>function(){return new \Ubiquity\log\libraries\UMonolog("backend",\Monolog\Logger::INFO);},
>>>>>>> upstream/master
		"di"=>["@exec"=>["jquery"=>function($controller){
						return \Ubiquity\core\Framework::diSemantic($controller);
					}]],
		"cache"=>["directory"=>"cache/","system"=>"Ubiquity\\cache\\system\\ArrayCache","params"=>[]],
		"mvcNS"=>["models"=>"models","controllers"=>"controllers","rest"=>""],
		"isRest"=>function(){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
);
