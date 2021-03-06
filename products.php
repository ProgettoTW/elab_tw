<?php
include_once("model/product.php");
include_once("includes/connection.php");

class ProductDB
{

    private string $products_table = "products";

    public function getById($ProductId)
    {

        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->products_table . " WHERE productID = ?");
        $querytoexec->bind_param("i", $ProductId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "ERRORE NELL'ESECUZIONE DELLA QUERY!";
            return null;
        }
        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Product($row["name"], $row["price"], $row["description"], $row["customizable"], $row["categoryID"], $row["quantity"]);
                $temp->setId($row["productID"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty\n";
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
    }

    public function getByCategoryId($categoryId)
    {

        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->products_table . " WHERE categoryID = ?");
        $querytoexec->bind_param('i', $categoryId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Product($row["name"], $row["price"], $row["description"], $row["customizable"], $row["categoryID"], $row["quantity"]);
                $temp->setId($row["productID"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty\n";
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
    }

    public function getAll()
    {

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->products_table);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;

        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Product($row["name"], $row["price"], $row["description"], $row["customizable"], $row["categoryID"], $row["quantity"]);
                $temp->setId($row["productID"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty\n";
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;
    }

    public function insert($product)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("INSERT INTO products (name, price, description, categoryID, customizable, quantity) VALUES (?, ?, ?, ?, 0, ?)");
        $prName = $product->getName();
        $prPrice = $product->getPrice();
        $prDescr = $product->getDescription();
        $prCategory = $product->getCategoryId();
        $prQuantity = $product->getQuantity();

        $querytoexec->bind_param('sdsii', $prName, $prPrice, $prDescr, $prCategory, $prQuantity);

        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }
        $result = $querytoexec->get_result();
        if ($result) {
            echo "Insert OK";
        } else {
        }
        $id = mysqli_stmt_insert_id($querytoexec);

        $querytoexec->close();
        $db->close();

        return $id;
    }

    public function delete($id)
    {

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("DELETE FROM " . $this->products_table . " WHERE productID = ?");
        $querytoexec->bind_param('i', $id);
        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }

        $result = $querytoexec->get_result();
        if ($result) {
            echo "Delete OK";
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();
    }

    public function update($product)
    {

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE " . $this->products_table . " SET name = ?, price = ?, description = ?, quantity = ?, categoryID = ? WHERE productID = ?");
        $prName = $product->getName();
        $prPrice = $product->getPrice();
        $prDescr = $product->getDescription();
        $prCategory = $product->getCategoryId();
        $prQuantity = $product->getQuantity();
        $prID = $product->getId();

        $querytoexec->bind_param('sisiii', $prName, $prPrice, $prDescr, $prQuantity, $prCategory, $prID);
        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }

        $result = $querytoexec->get_result();
        if ($result) {
        } else {
            echo($querytoexec->error);
            die();
        }

        $querytoexec->close();
        $db->close();
    }

    public function updatePriceQuant($price, $quantity, $ID)
    {
        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE " . $this->products_table . " SET price = ?, quantity = ? WHERE productID = ?");

        $querytoexec->bind_param('dii', $price, $quantity, $ID);

        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }


        $result = $querytoexec->get_result();

        if ($result) {
        } else {

            echo($querytoexec->error);
            return null;
        }


        $querytoexec->close();
        $db->close();
    }

    public function removeQuant($quantity, $ID)
    {
        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT quantity FROM " . $this->products_table . " WHERE productID = ?");
        $querytoexec->bind_param('i', $ID);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;

        }
        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $actualQuantity = $row["quantity"];
            }
        } else {
            echo "Empty\n";
            return null;
        }
        $newQuantity = $actualQuantity - $quantity;
        $querytoexec1 = $db->prepare("UPDATE " . $this->products_table . " SET quantity = ? WHERE productID = ?");

        $querytoexec1->bind_param('ii', $newQuantity, $ID);

        if (!$querytoexec1->execute()) {
            echo($querytoexec1->error);
        }

        $result = $querytoexec1->get_result();

        if ($result) {
        } else {

            echo($querytoexec1->error);
            return null;
        }

        $querytoexec->close();
        $querytoexec1->close();
        $db->close();
    }

    public function isTerminatd($ID)
    {
        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT quantity FROM " . $this->products_table . " WHERE productID = ?");
        $querytoexec->bind_param('i', $ID);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;

        }
        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $actualQuantity = $row["quantity"];
            }
        } else {
            echo "Empty\n";
            return null;
        }
        $querytoexec->close();
        $db->close();

        if ($actualQuantity <= 0) {
            return true;
        }
        return false;
    }


    public function searchProduct($string)
    {

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->products_table . " WHERE name LIKE CONCAT('%',?,'%') OR description LIKE CONCAT('%',?,'%')");
        $querytoexec->bind_param('ss', $string, $string);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Product($row["name"], $row["price"], $row["description"], $row["category_id"]);
                $temp->setId($row["id"]);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();

        $db->close();
        return $rows;
    }
}
