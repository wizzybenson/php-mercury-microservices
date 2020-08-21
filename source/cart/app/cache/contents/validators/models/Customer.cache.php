<?php
return array("id"=>array(array("type"=>"id","constraints"=>array("autoinc"=>true))),"username"=>array(array("type"=>"length","constraints"=>array("max"=>255,"notNull"=>true))),"email"=>array(array("type"=>"email","constraints"=>array("notNull"=>true)),array("type"=>"length","constraints"=>array("max"=>255))));
