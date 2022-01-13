<?php
include_once("model/product.php");
include_once("includes/connection.php");

class ProductDB
{

    private string $table_name = "Product";

    public function getById($ProductId)
    {

        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->Product . " WHERE ProductId = ?");
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
        $querytoexec = $db->prepare(query: "SELECT * FROM " . $this->table_name);
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

        $querytoexec = $db->prepare("INSERT INTO " . $this->table_name . " (name, price, description, category_id) VALUES (?, ?, ?, ?)");
        $prName = $product->getName();
        $prPrice = $product->getPrice();
        $prDescr = $product->getDescription();
        $prCategory = $product->getCategoryId();
        $querytoexec->bind_param('sdsi', $prName, $prPrice, $prDescr, $prCategory);
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
        $querytoexec = $db->prepare("DELETE FROM " . $this->table_name . " WHERE id = ?");
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

    //TODO
    public function update($product)
    {

        $conn = new Connection();
        $db = $conn->getConnection();

        //TODO
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

        $querytoexec = $db->prepare("SELECT * FROM " . $this->table_name . " WHERE name LIKE CONCAT('%',?,'%') OR description LIKE CONCAT('%',?,'%')");
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