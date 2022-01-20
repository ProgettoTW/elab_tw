<?php

require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("includes/connection.php");

class CartManager{

    private $items_table = "cartItem";
    private $cart_table = "cart";
    private $products_table = "products";

    public function getCartItems($userId) {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT i.ID, p.productID as 'pid', p.name, i.quantity, c.cartID as 'cid' FROM ".$this->cart_table." c, ".$this->items_table." i, ".$this->products_table." p WHERE i.cartID = c.cartID AND c.email = ? AND p.productID = i.productID AND i.quantity > 0");
        $querytoexec->bind_param('s', $userId);
        //userId is te email
        $result = $querytoexec->execute();
        if (!$result){
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Cart_item($row["pid"], $row["quantity"], $row["cid"]);
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

    public function emptyCart($userId) {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE ".$this->items_table." i, ".$this->cart_table." c SET i.quantity = 0 WHERE c.cartID = i.cartID AND c.email = ?");
        $querytoexec->bind_param('s', $userId);
        if (!$querytoexec->execute()){
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

    public function getByProductId($productId, $userId) {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT i.ID, i.productID 'pid', i.quantity, c.cartID as 'cid' FROM ".$this->cart_table." c, ".$this->items_table." i WHERE i.cartID = c.cartID AND c.email = ? AND i.productID = ? AND quantity > 0");
        //$querytoexec->bind_param('i', $userId);
        $querytoexec->bind_param('si', $userId, $productId);
        $result = $querytoexec->execute();
        if (!$result){
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Cart_item($row["pid"], $row["quantity"], $row["cid"]);
                $temp->setId($row["ID"]);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;

    }

    public function isInCart($productId, $userId){
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM ".$this->cart_table." c, ".$this->items_table." i WHERE i.cartID = c.cartID AND c.email = ? AND i.productID = ? and quantity > 0");
        $querytoexec->bind_param('si', $userId, $productId);
        $result = $querytoexec->execute();
        if (!$result){
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


    public function insertItem($cartItem){

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO ".$this->items_table." (productID, cartID, quantity) VALUES (?, ?, ?)");
        $itProductId = $cartItem->getProductId();
        $itCartId = $cartItem->getCartId();
        $itQuantity = $cartItem->getQuantity();
        $querytoexec->bind_param('iii', $itProductId, $itCartId, $itQuantity);
        if (!$querytoexec->execute()){
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

    public function updateQuantity($cartItemId, $quantity){

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        if ($quantity > 0 && $quantity <= 10) {
            $querytoexec = $db->prepare("UPDATE ".$this->items_table." SET quantity = ? WHERE id = ?");
            $querytoexec->bind_param('ii',  $quantity, $cartItemId);
            if (!$querytoexec->execute()){
                echo($querytoexec->error);
            }
        } else if ($quantity == 0) {
            $querytoexec = $db->prepare("UPDATE ".$this->items_table." SET quantity = 0 WHERE id = ?");
            $querytoexec->bind_param('i', $cartItemId);
            if (!$querytoexec->execute()){
                echo($querytoexec->error);
            }
        } else return null;

        $result = $querytoexec->get_result();
        if ($result) {
            echo "Update OK";
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();
    }

    public function insertCart($cart){

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO ".$this->cart_table." (email) VALUES (?)");
        $cartUser = $cart->getUserId();

        $querytoexec->bind_param('s', $cartUser);
        if (!$querytoexec->execute()){
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


}
?>
