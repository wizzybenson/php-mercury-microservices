<?php
return array("/payments/paypalAdmin/deletePaypal/(.*?)"=>array("delete"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"deletePaypal","parameters"=>array("*"),"name"=>"PaypalAdminController-deletePaypal","cache"=>false,"duration"=>false)),"/payments/giftcards/deleteGiftCard/(.*?)"=>array("delete"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"deleteGiftCard","parameters"=>array("*"),"name"=>"GiftCardAdminController-deleteGiftCard","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/delete/(.*?)"=>array("delete"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"delete","parameters"=>array("*"),"name"=>"PaypalRefundController-delete","cache"=>false,"duration"=>false)),"/payments/activated_paypal/(.+?)/"=>array("options"=>array("controller"=>"controllers\\ActivatedPaypalController","action"=>"options","parameters"=>array(0),"name"=>"ActivatedPaypalController-options","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/(.+?)/"=>array("options"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"options","parameters"=>array(0),"name"=>"PaypalAdminController-options","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/getAll/"=>array("get"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"getAll","parameters"=>array(),"name"=>"PaypalAdminController-getAll","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"PaypalAdminController-getOne","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/getOne/(.+?)/"=>array("get"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"getOne","parameters"=>array(0),"name"=>"PaypalAdminController-getOne","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/addPaypal/"=>array("post"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"addPaypal","parameters"=>array(),"name"=>"PaypalAdminController-addPaypal","cache"=>false,"duration"=>false)),"/payments/paypalAdmin/updatePaypal/(.*?)"=>array("patch"=>array("controller"=>"controllers\\PaypalAdminController","action"=>"updatePaypal","parameters"=>array("*"),"name"=>"PaypalAdminController-updatePaypal","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"PaypalRefundController-getOne","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/get/(.*?)"=>array("get"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"get","parameters"=>array("~0","~1","~2"),"name"=>"PaypalRefundController-get","cache"=>false,"duration"=>false)),"/payments/payments/getActivatedPayments/"=>array("get"=>array("controller"=>"controllers\\PaymentController","action"=>"getActivatedPayments","parameters"=>array(),"name"=>"PaymentController-getActivatedPayments","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/update/(.*?)"=>array("patch"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"update","parameters"=>array("*"),"name"=>"PaypalRefundController-update","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/add/"=>array("post"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"add","parameters"=>array(),"name"=>"PaypalRefundController-add","cache"=>false,"duration"=>false)),"/payments/paypal_refunds/(index/)?"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"index","parameters"=>array(),"name"=>"PaypalRefundController-index","cache"=>false,"duration"=>false),"/payments/paypal_refunds/connect/"=>array("controller"=>"controllers\\PaypalRefundController","action"=>"connect","parameters"=>array(),"name"=>"PaypalRefundController-connect","cache"=>false,"duration"=>false),"/payments/paypal_transactions/getOne/(.+?)/"=>array("get"=>array("controller"=>"controllers\\PaypalTransactionController","action"=>"getPaypalTransaction","parameters"=>array(0),"name"=>"PaypalTransactionController-getPaypalTransaction","cache"=>false,"duration"=>false)),"/payments/refunds/(.+?)/"=>array("options"=>array("controller"=>"controllers\\RefundController","action"=>"options","parameters"=>array(0),"name"=>"RefundController-options","cache"=>false,"duration"=>false)),"/payments/refunds/getAll/"=>array("get"=>array("controller"=>"controllers\\RefundController","action"=>"getAll","parameters"=>array(),"name"=>"RefundController-getAll","cache"=>false,"duration"=>false)),"/payments/payments/updatePayment/(.*?)"=>array("patch"=>array("controller"=>"controllers\\PaymentController","action"=>"updatePayment","parameters"=>array("*"),"name"=>"PaymentController-updatePayment","cache"=>false,"duration"=>false)),"/payments/payments/getAll/"=>array("get"=>array("controller"=>"controllers\\PaymentController","action"=>"getAll","parameters"=>array(),"name"=>"PaymentController-getAll","cache"=>false,"duration"=>false)),"/payments/payments/getPayment/(.+?)/"=>array("get"=>array("controller"=>"controllers\\PaymentController","action"=>"getPayment","parameters"=>array(0),"name"=>"PaymentController-getPayment","cache"=>false,"duration"=>false)),"/payments/costumorpayments/get_refunds/(.+?)/"=>array("get"=>array("controller"=>"controllers\\CostumorPaymentController","action"=>"getRefunds","parameters"=>array(0),"name"=>"CostumorPaymentController-getRefunds","cache"=>false,"duration"=>false)),"/payments/activated_paypal/updateActivatedPaypal/(.+?)/"=>array("patch"=>array("controller"=>"controllers\\ActivatedPaypalController","action"=>"updateActivatedPaypal","parameters"=>array(0),"name"=>"ActivatedPaypalController-updateActivatedPaypal","cache"=>false,"duration"=>false)),"/payments/authorizations/(.+?)/"=>array("options"=>array("controller"=>"controllers\\AuthorizationController","action"=>"options","parameters"=>array(0),"name"=>"AuthorizationController-options","cache"=>false,"duration"=>false)),"/payments/authorizations/getAll/"=>array("get"=>array("controller"=>"controllers\\AuthorizationController","action"=>"getAll","parameters"=>array(),"name"=>"AuthorizationController-getAll","cache"=>false,"duration"=>false)),"/payments/authorizations/getCountNotCaptured/"=>array("get"=>array("controller"=>"controllers\\AuthorizationController","action"=>"getCountNotCaptured","parameters"=>array(),"name"=>"AuthorizationController-getCountNotCaptured","cache"=>false,"duration"=>false)),"/payments/authorizations/capturePaypalAuth/"=>array("post"=>array("controller"=>"controllers\\AuthorizationController","action"=>"capturePaypalAuth","parameters"=>array(),"name"=>"AuthorizationController-capturePaypalAuth","cache"=>false,"duration"=>false)),"/payments/costumorpayments/getPaypalPayment/(.+?)/"=>array("get"=>array("controller"=>"controllers\\CostumorPaymentController","action"=>"getPaypalPayment","parameters"=>array(0),"name"=>"CostumorPaymentController-getPaypalPayment","cache"=>false,"duration"=>false)),"/payments/costumorpayments/(.+?)/"=>array("options"=>array("controller"=>"controllers\\CostumorPaymentController","action"=>"options","parameters"=>array(0),"name"=>"CostumorPaymentController-options","cache"=>false,"duration"=>false)),"/payments/costumorpayments/getAll/"=>array("get"=>array("controller"=>"controllers\\CostumorPaymentController","action"=>"getAll","parameters"=>array(),"name"=>"CostumorPaymentController-getAll","cache"=>false,"duration"=>false)),"/payments/costumorpayments/addPayment/"=>array("post"=>array("controller"=>"controllers\\CostumorPaymentController","action"=>"addPayment","parameters"=>array(),"name"=>"CostumorPaymentController-addPayment","cache"=>false,"duration"=>false)),"/payments/activated_paypal/getActivated/"=>array("get"=>array("controller"=>"controllers\\ActivatedPaypalController","action"=>"getActivated","parameters"=>array(),"name"=>"ActivatedPaypalController-getActivated","cache"=>false,"duration"=>false)),"/payments/giftcards/(.+?)/"=>array("options"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"options","parameters"=>array(0),"name"=>"GiftCardAdminController-options","cache"=>false,"duration"=>false)),"/payments/giftcards/getAll/"=>array("get"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"getAll","parameters"=>array(),"name"=>"GiftCardAdminController-getAll","cache"=>false,"duration"=>false)),"/payments/giftcards/getOne/(.+?)/(.*?)"=>array("get"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"getOne","parameters"=>array(0,"~1","~2"),"name"=>"GiftCardAdminController-getOne","cache"=>false,"duration"=>false)),"/payments/giftcards/getOne/(.+?)/"=>array("get"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"getOne","parameters"=>array(0),"name"=>"GiftCardAdminController-getOne","cache"=>false,"duration"=>false)),"/payments/giftcards/addGiftCard/"=>array("post"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"addGiftCard","parameters"=>array(),"name"=>"GiftCardAdminController-addGiftCard","cache"=>false,"duration"=>false)),"/payments/giftcards/updateGiftCard/(.*?)"=>array("patch"=>array("controller"=>"controllers\\GiftCardAdminController","action"=>"updateGiftCard","parameters"=>array("*"),"name"=>"GiftCardAdminController-updateGiftCard","cache"=>false,"duration"=>false)),"/payments/gift_card_transactions/getOne/(.+?)/"=>array("get"=>array("controller"=>"controllers\\GiftCardTransactionController","action"=>"getGiftCardTransaction","parameters"=>array(0),"name"=>"GiftCardTransactionController-getGiftCardTransaction","cache"=>false,"duration"=>false)),"/payments/payments/(.+?)/"=>array("options"=>array("controller"=>"controllers\\PaymentController","action"=>"options","parameters"=>array(0),"name"=>"PaymentController-options","cache"=>false,"duration"=>false)),"/payments/refunds/addPaypalRefund/"=>array("post"=>array("controller"=>"controllers\\RefundController","action"=>"paypalRefund","parameters"=>array(),"name"=>"RefundController-paypalRefund","cache"=>false,"duration"=>false)));
