<?php

require_once("model/order.php");
require_once("model/order_item.php");
require_once("cart_manager.php");
require_once("includes/connection.php");

class OrderManager
{

    private string $orderItemTable = "orderItem";
    private string $orderTable = "orders";
    private string $productTable = "products";
    private string $cartItemTable = "cartItem";
    private string $cartTable = "cart";

    public function getOrderItems($orderId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection Failed: " . $db->error);
        }
        $querytoexec = $db->prepare("SELECT i.ID, p.productID as 'pid', p.name, i.quantity, o.orderID as 'oid' FROM " . $this->orderTable . " o, " . $this->orderItemTable . " i, " . $this->orderItemTable . " p WHERE i.orderID = o.orderID AND i.orderID = ? AND p.productID = i.productID AND p.quantity > 0 ORDER BY o.time");
        $querytoexec->bind_param('i', $orderId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "echo";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Order_Item($row["pid"], $row["quantity"], $row["oid"]);
                $temp->setId($row["ID"]);
                $temp->setProductName($row["name"]);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
    }

    public function getOrderItemsNum($orderId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection Failed: " . $db->error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->orderItemTable . " WHERE orderID = ?");
        $querytoexec->bind_param('i', $orderId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }
        $result = $querytoexec->get_result();
        return $result->num_rows;
    }

    public function getOrdersByUserId($userId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT orderID, email, time FROM " . $this->orderTable . " WHERE email = ?");
        $querytoexec->bind_param('s', $userId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }


        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Order($row["email"]);
                $temp->setTime($row["time"]);
                $temp->setId($row["orderID"]);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
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

    public function getOrderOwnerId($orderId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection Failed: " . $db->error);
        }
        $querytoexec = $db->prepare("SELECT email FROM " . $this->orderTable . " WHERE orderID = ?");
        $querytoexec->bind_param('i', $orderId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "echo";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $email = $row['email'];
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();
        return $email;
    }

    public function setOrderStatus($orderId, $status)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE " . $this->orderTable . " SET status = ? WHERE orderID = ?");
        $querytoexec->bind_param('si', $status, $orderId);
        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }

        $result = $querytoexec->get_result();
        if ($result) {
            echo "Update OK";
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();
    }

    public function getOrderStatus($orderId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT orderID, status FROM " . $this->orderTable . " WHERE orderID = ? ");
        $querytoexec->bind_param('i', $orderId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status = $row['status'];
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();
        return $status;
    }

    public function isInOrder($productId, $orderId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->orderTable . " o, " . $this->orderItemTable . " i WHERE i.orderID = o.orderID AND o.orderID = ? AND i.productID = ? and quantity > 0");
        $querytoexec->bind_param('ii', $orderId, $productId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        $querytoexec->close();
        $db->close();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }


    }

    public function insertItem($orderItem)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO " . $this->orderItemTable . " (productID, orderID, quantity, name) VALUES (?, ?, ?, ?)");
        $itProductId = $orderItem->getProductId();
        $itOrderId = $orderItem->getOrderId();
        $itQuantity = $orderItem->getQuantity();
        $itName = $orderItem->getProductName();
        $querytoexec->bind_param('iiis', $itProductId, $itOrderId, $itQuantity, $itName);
        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }

        $result = $querytoexec->get_result();
        if ($result) {
            echo "Insert OK";
        } else {
            return null;
        }
        $querytoexec->close();
        $db->close();

    }

    public function insertOrder($order)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $now = new DateTime("now");

        $ricevuto = "Ricevuto";

        $ora = $now->format('Y-m-d H:i:s.u');

        $querytoexec = $db->prepare("INSERT INTO " . $this->orderTable . " (email, status, time) VALUES (?, ?, ?)");
        $ordUser = $order->getUserId();

        $querytoexec->bind_param('sss', $ordUser, $ricevuto, $ora);

        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }
        $result = $querytoexec->get_result();
        $id = mysqli_stmt_insert_id($querytoexec);

        $querytoexec->close();
        $db->close();

        return $id;

    }


}