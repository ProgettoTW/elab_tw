<?php
include_once("model/category.php");
include_once("includes/connection.php");

class CategoryDB
{

    private $categories_table = "categories";
    private $products_table = "products";

    public function getById($categoryId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM" . $this->categories_table . "WHERE id = ?");
        $querytoexec->bind_param('i', $categoryId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "E vabbè, c'è stato un errore, spiaze";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Category($row["name"], $row["description"]);
                $temp->setId($row["id"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty";
            return null;
        }

        $querytoexec->close();
        $db->close();
        return $rows;
    }

    public function getByProductId($productId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT c.name, c.description, c.categoryID FROM" . $this->categories_table . "c, " . $this->products_table . " p WHERE p.productID = ? AND p.categoryID = c.categoryID");
        $querytoexec->bind_param('i', $productId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "E vabbè, c'è stato un errore, spiaze";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Category($row["name"], $row["description"]);
                $temp->setId($row["id"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty";
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

        $querytoexec = $db->prepare("SELECT * FROM *" . $this->categories_table);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "E vabbè, c'è stato un errore, spiaze";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Category($row["name"], $row["description"]);
                $temp->setId($row["id"]);
                $rows[] = $temp;
            }
        } else {
            echo "Empty";
            return null;
        }

        $querytoexec->close();
        $db->close();
        return $rows;
    }

}