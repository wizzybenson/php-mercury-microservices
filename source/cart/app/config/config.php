<?php
return array(
		"siteUrl"=>"http://localhost/cartProject/",
		"database"=>[
				"type"=>"mysql",
				"dbName"=>"cartdb",
				"serverName"=>"localhost",
				"port"=>"6668",
				"user"=>"abdo",
				"password"=>"mysecret",
				"options"=>[],
				"cache"=>false
		],
		"sessionName"=>"cartProject",
		"namespaces"=>[],
		"templateEngine"=>'Ubiquity\\views\\engine\\Twig',
		"templateEngineOptions"=>array("cache"=>false),
		"test"=>false,
		"debug"=>false,
		"logger"=>function(){return new \Ubiquity\log\libraries\UMonolog("cartProject",\Monolog\Logger::INFO);},
		"di"=>["@exec"=>["jquery"=>function($controller){
						return \Ubiquity\core\Framework::diSemantic($controller);
					}]],
		"cache"=>["directory"=>"cache/","system"=>"Ubiquity\\cache\\system\\ArrayCache","params"=>[]],
		"mvcNS"=>["models"=>"models","controllers"=>"controllers","rest"=>""],
		"isRest"=>function(){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
);
