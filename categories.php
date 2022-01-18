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

        $querytoexec = $db->prepare("SELECT c.name, c.description, c.categoryID FROM" . $this->categories_table . " c, " . $this->products_table . " p WHERE p.productID = ? AND p.categoryID = c.categoryID");
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


    public function insert($category)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO " . $this->categories_table . " (name, description) VALUES (?, ?)");
        $catName = $category->getName();
        $catDesc = $category->getDescription();
        $querytoexec->bind_param('ss', $catName, $catDesc);
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

    public function delete($id)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("DELETE FROM " . $this->categories_table . " WHERE categoryID = ?");

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

    public function update($category)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE " . $this->categories_table . " SET name = ?, description = ? WHERE categoryID = ?");
        $catName = $category->getName();
        $catDesc = $category->getDescription();
        $catId = $category->getId();
        $querytoexec->bind_param('ssi', $catName, $catDesc, $catId);
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

}