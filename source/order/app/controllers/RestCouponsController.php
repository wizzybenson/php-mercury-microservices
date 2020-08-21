<?php
namespace controllers;

use models\Coupon;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller RestCouponsController
 * @route("/rest/coupons","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Coupon")
 */
class RestCouponsController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/newCoupon", "methods"=>["post"])
     */
    public function newCoupon(){
        if(URequest::isPost()){
            $coupon = new Coupon();
            $idOrder = URequest::getDatas()["id_order"];
            $coupon->setCode(URequest::getDatas()["code"]);
            $coupon->setValue(URequest::getDatas()["value"]);
            $coupon->setExpirationDate(URequest::getDatas()["expiration_date"]);
            $coupon->setCreationDate(URequest::getDatas()["creation_date"]);
            $coupon->attributeToOrder($idOrder);
        }
    }
}
