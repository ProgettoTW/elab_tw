<?php

require_once("model/order.php");
require_once("model/order_item.php");
require_once("cart_manager.php");
require_once("includes/connection.php");

class OrderManager
{

    private $orderItemTable = "orderItem";
    private $orderTable = "orders";
    private $productTable = "products";
    private $cartItemTable = "cartItem";
    private $cartTable = "cart";

    public function getOrderItems($orderId)
    {
        //TODO
        return null;
    }

    public function getOrdersByUserId($userId)
    {
        //TODO
        return null;
    }

    public function getAllOrders()
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection Failed: " . $db->error);
        }

        $querytoexec = $db->prepare("SELECT orderID, email, time FROM " . $this->orderTable . " order by time desc");
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Order($row['email']);
                $temp->setTime($row['time']);
                $temp->setId($row['orderID']);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
    }

    public function setOrderStatus()
    {
        //TODO
        return null;
    }

    public function getOrderStatus()
    {
        //TODO
        return null;
    }

    public function isInOrder($productId, $orderId)
    {
        //TODO
        return null;
    }

    public function insertItem($orderItem)
    {
        //TODO
        return null;
    }

    public function insertOrder($order)
    {
        //TODO
        return null;
    }


}