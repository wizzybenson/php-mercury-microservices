<?php
namespace controllers;

use models\Refund;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller RestRefundController
 * @route("/rest/refunds","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Refund")
 */
class RestRefundController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @route("/newRefund","methods"=>["post"])
     */
    public function newRefund(){
        if(URequest::isPost()){
            $refund = new Refund();
            URequest::setPostValuesToObject($refund);
            if($refund->save())
                echo ' - refund added successfully - ';
            else if ($refund->save() == null)
                echo ' - refund is not added -> refund doesn\'t refer to any order - ';
            else
                echo ' - refund is not added - ';
        }
    }

    /**
     * @param integer $id
     * @route("/cancel/{id}", "methods"=>["put"])
     * @throws \Ubiquity\exceptions\DAOException
     */
    public function cancel($id){
        $refund = DAO::getOne(Refund::class, $id);
        if($refund->cancel())
            echo ' - refund canceled - ';
        else
            echo ' - refund is not canceled - ';
    }

    /**
     * @param integer|string $value
     * @param string $field
     * @route("/getRefundsBy/{field}/{value}", "methods"=>["get"])
     */
    public function getRefundsBy($field,$value){
        if(Refund::getRefundsBy($field, $value) === null)
            echo 'no refund was found';
        else
            echo json_encode(Refund::getRefundsBy($field, $value));
    }
}
