<?php
namespace controllers;

use models\Order;
use Ubiquity\orm\DAO;
use Ubiquity\utils\http\URequest;

/**
 * Rest Controller RestOrderController
 * @route("/rest/orders","inherited"=>true,"automated"=>true)
 * @rest("resource"=>"models\Order")
 */
class RestOrderController extends \Ubiquity\controllers\rest\RestController {
    /**
     * @param array $keyValues
     * @route("/getCartByOrderId/{keyValues}", "methods"=>["get"])
     */
    public function getCartByOrder($keyValues){
        $order = DAO::getById(Order::class, $keyValues);
        if($order != null) {
            echo $order->getCart('781996fca2b0b662d659');
        }else
            echo 'order doesn\'t exist';
    }

    /**
     * @route("/newOrder", "methods"=>["post"])
     */
    public function newOrder(){
        if(URequest::isPost()){
            $order = new Order();
            URequest::setPostValuesToObject($order);
            if($order->save('c82755ff30b8cead74cf'))
                echo '-order added successfully-';
            else
                echo '-order not added-';
        }
    }

    /**
     * @param array $keyValues
     * @route("/deleteOrder/{keyValues}", "methods"=>["delete"])
     */
    public function deleteOrder($keyValues){
        $order = DAO::getById(Order::class, $keyValues);
        if($order->delete())
           echo '-order deleted successfully-';
        else
            echo '-order not deleted-';
    }
    /**
     * @param string $field
     * @param string|integer $value
     * @route("/getOrdersBy/{field}/{value}", "methods"=>["get"])
     */
    public function getOrdersBy($field, $value){
        if(Order::getOrdersBy($field, $value) === null)
            echo ' - no order was found - ';
        else
            echo json_encode(Order::getOrderBy($field, $value));
    }

    /**
     * @param integer $idOrder
     * @route("/makePayment/{idOrder}", "methods"=>["put"])
     */
    public function makePayment($idOrder){
        $order = DAO::getById(Order::class, $idOrder);
        $order->makePayment();
    }

    /**
     * @param integer $id
     * @route("/change-status/{id}", "methods"=>["put"])
     */
    public function change_status($id){
        $status = URequest::getDatas()["status"];
        $order = DAO::getOne(Order::class, $id);
        if($order->change_status($status))
            echo '- status changed successfully -';
        else if($order->change_status($status) == null)
            echo '- invalid status -';
        else
            echo '- status does not changed -';
    }

    /**
     * @param string $id
     * @route("/getAmount/{id}", "methods"=>["get"])
     */
    public function getAmount($id){
        $order = DAO::getOne(Order::class, $id);
        return json_encode($order->getAmount());
    }
}
