<?php
return array("#tableName"=>"refunds","#primaryKeys"=>array("refundid"=>"refundid"),"#manyToOne"=>array("payment_transaction"),"#fieldNames"=>array("refundid"=>"refundid","amount"=>"amount","currencycode"=>"currencycode","type"=>"type","createtime"=>"createtime","refund_transaction"=>"refund_transaction","payment_transaction"=>"payment_transaction_id"),"#memberNames"=>array("refundid"=>"refundid","amount"=>"amount","currencycode"=>"currencycode","type"=>"type","createtime"=>"createtime","refund_transaction"=>"refund_transaction","payment_transaction_id"=>"payment_transaction"),"#fieldTypes"=>array("refundid"=>"mixed","amount"=>"mixed","currencycode"=>"mixed","type"=>"mixed","createtime"=>"mixed","refund_transaction"=>"mixed","payment_transaction"=>false),"#nullable"=>array(),"#notSerializable"=>array("payment_transaction"),"#transformers"=>array(),"#accessors"=>array("refundid"=>"setRefundid","amount"=>"setAmount","currencycode"=>"setCurrencycode","type"=>"setType","createtime"=>"setCreatetime","refund_transaction"=>"setRefund_transaction","payment_transaction_id"=>"setPayment_transaction"),"#joinColumn"=>array("payment_transaction"=>array("className"=>"models\\CostumorPayment","name"=>"payment_transaction_id","nullable"=>false)),"#invertedJoinColumn"=>array("payment_transaction_id"=>array("member"=>"payment_transaction","className"=>"models\\CostumorPayment")));
