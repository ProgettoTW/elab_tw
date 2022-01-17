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
                $temp = new Product($row["ProductName"], $row["UnitPrice"], $row["Customizable"], $row["SellerId"]);
                $temp->setId($row["id"]);
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

        //TODO
        $db->close();
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
                $temp = new Product($row["ProductName"], $row["UnitPrice"], $row["Description"], $row["Customizable"]);
                $temp->setId($row["ProductId"]);
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
        //TODO Need to add customizable, I still need to think about it, maybe I'll just stick with a single flag in every insertion
        $querytoexec = $db->prepare("INSERT INTO " . $this->products_table . " (name, price, description, categoryID, quantity) VALUES (?, ?, ?, ?, ?, ?)");
        $prName = $product->getName();
        $prPrice = $product->getPrice();
        $prDescr = $product->getDescription();
        $prCategory = $product->getCategoryId();
        $quantity = $product->getQuantity();
        $querytoexec->bind_param('sdsii', $prName, $prPrice, $prDescr, $prCategory, $quantity);
        if (!$querytoexec->execute()) {
            echo($querytoexec->error);
        }

        $result = $querytoexec->get_result();
        if ($result) {
            echo "Insert OK";
        } else {
            return null;
        }
        $id = mysqli_stmt_insert_id($querytoexec);

        $querytoexec->close();
        $db->close();
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
        if (!$result) {
            echo($querytoexec->error);
            die();
        }

        $querytoexec->close();
        $db->close();
    }

    //TODO La logica c'è, bisogna definire come vogliamo gestire le categorie e il resto
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

?>