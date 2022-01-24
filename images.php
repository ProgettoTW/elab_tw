<?php

include_once("model/product.php");
include_once("model/image.php");
include_once("includes/connection.php");

class ImageDB
{

    private string $imagesTable = "images";

    public function getById($imageId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->imagesTable . " WHERE imageID = ?");
        $querytoexec->bind_param('i', $imageId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Image($row["productID"], $row["url"], $row["alt"]);
                $temp->setId($row["imageID"]);
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

        $querytoexec = $db->prepare("SELECT * FROM " . $this->imagesTable);
        $result = $querytoexec->execute();

        if (!$result) {
            echo "error";
            return null;
        } else {
            //Boh
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Image($row["productID"], $row["url"], $row["alt"]);
                $temp->setId($row["imageID"]);
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

    public function insert($image)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO " . $this->imagesTable . " (productID, url, alt) VALUES (?, ?, ?)");
        $imProdId = $image->getProductId();
        $imUrl = $image->getUrl();
        $imAlt = $image->getAlt();
        $querytoexec->bind_param('iss', $imProdId, $imUrl, $imAlt);
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

        $querytoexec = $db->prepare("DELETE FROM " . $this->imagesTable . " WHERE imageID = ?");
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

    public function update($image)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $queryexec = $db->prepare("UPDATE " . $this->imagesTable . " SET productID = ?, url = ?, alt = ? WHERE imageID = ?");
        $imProdId = $image->getProductId();
        $imUrl = $image->getUrl();
        $imAlt = $image->getAlt();
        $imId = $image->getId();
        $queryexec->bind_param('issi', $imProdId, $imUrl, $imAlt, $imId);
        if (!$queryexec->execute()) {
            echo($queryexec->error);
        }

        $result = $queryexec->get_result();
        if ($result) {
            echo "Update OK";
        } else {
            return null;
        }

        $queryexec->close();
        $db->close();
    }
}