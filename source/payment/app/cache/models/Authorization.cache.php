<?php
return array("#tableName"=>"authorizations","#primaryKeys"=>array("authorization_id"=>"authorization_id"),"#manyToOne"=>array("payment","payment_transaction"),"#fieldNames"=>array("authorization_id"=>"authorization_id","createtime"=>"createtime","expiration_date"=>"expiration_date","capture_date"=>"capture_date","payment"=>"paymentmethod","authorization_transaction"=>"authorization_transaction","payment_transaction"=>"payment_transaction_id","status"=>"status"),"#memberNames"=>array("authorization_id"=>"authorization_id","createtime"=>"createtime","expiration_date"=>"expiration_date","capture_date"=>"capture_date","paymentmethod"=>"payment","authorization_transaction"=>"authorization_transaction","payment_transaction_id"=>"payment_transaction","status"=>"status"),"#fieldTypes"=>array("authorization_id"=>"mixed","createtime"=>"mixed","expiration_date"=>"mixed","capture_date"=>"mixed","payment"=>false,"authorization_transaction"=>"mixed","payment_transaction"=>false,"status"=>"mixed"),"#nullable"=>array(),"#notSerializable"=>array("payment","payment_transaction"),"#transformers"=>array(),"#accessors"=>array("authorization_id"=>"setAuthorization_id","createtime"=>"setCreatetime","expiration_date"=>"setExpiration_date","capture_date"=>"setCapture_date","paymentmethod"=>"setPayment","authorization_transaction"=>"setAuthorization_transaction","payment_transaction_id"=>"setPayment_transaction","status"=>"setStatus"),"#joinColumn"=>array("payment"=>array("className"=>"models\\Payment","name"=>"paymentmethod","nullable"=>false),"payment_transaction"=>array("className"=>"models\\CostumorPayment","name"=>"payment_transaction_id","nullable"=>false)),"#invertedJoinColumn"=>array("paymentmethod"=>array("member"=>"payment","className"=>"models\\Payment"),"payment_transaction_id"=>array("member"=>"payment_transaction","className"=>"models\\CostumorPayment")));
