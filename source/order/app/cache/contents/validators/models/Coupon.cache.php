<?php
return array("id"=>array(array("type"=>"id","constraints"=>array("autoinc"=>true))),"code"=>array(array("type"=>"length","constraints"=>array("max"=>255,"notNull"=>true))),"creation_date"=>array(array("type"=>"type","constraints"=>array("ref"=>"dateTime","notNull"=>true))),"expiration_date"=>array(array("type"=>"type","constraints"=>array("ref"=>"dateTime","notNull"=>true))));
