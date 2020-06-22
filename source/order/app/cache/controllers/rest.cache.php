<?php
return array("controllers\\RestOrderController"=>array("resource"=>"models\\Order","authorizations"=>array("update","add","delete"),"route"=>"/rest/orders"),"controllers\\RestRefundController"=>array("resource"=>"models\\Refund","authorizations"=>array("update","add","delete"),"route"=>"/rest/refunds"));
