<?php
return array("#tableName"=>"payments","#primaryKeys"=>array("paymentid"=>"paymentid"),"#manyToOne"=>array(),"#fieldNames"=>array("paymentid"=>"paymentid","url"=>"url","title"=>"title","description"=>"description","image"=>"image","status"=>"status","transactions"=>"transactions"),"#memberNames"=>array("paymentid"=>"paymentid","url"=>"url","title"=>"title","description"=>"description","image"=>"image","status"=>"status","transactions"=>"transactions"),"#fieldTypes"=>array("paymentid"=>"mixed","url"=>"mixed","title"=>"mixed","description"=>"mixed","image"=>"mixed","status"=>"mixed","transactions"=>"mixed"),"#nullable"=>array(),"#notSerializable"=>array("transactions"),"#transformers"=>array(),"#accessors"=>array("paymentid"=>"setPaymentid","url"=>"setUrl","title"=>"setTitle","description"=>"setDescription","image"=>"setImage","status"=>"setStatus","transactions"=>"setTransactions"),"#oneToMany"=>array("transactions"=>array("mappedBy"=>"tikakaka","className"=>"models\\CostumorPayment")));
