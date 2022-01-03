<?php
include_once("model/product.php");
include_once("includes/connection.php");

class ProductDB {

	private $table_name = "Product";

//    public function getById($ProductId) {
//
//		$conn = new Connection();
//		$db = $conn->getConnection();
//		if ($db->connect_error) {
//			die("Connection failed: " . $db->connect_error);
//		}
//		$querytoexec = $db->prepare("SELECT * FROM ".$this->Product." WHERE ProductId = ?");
//		$querytoexec->bind_param("i", $ProductId);
//		$result = $querytoexec->execute();
//		if (!$result){
//			echo "ERRORE NELL'ESECUZIONE DELLA QUERY!";
//			return null;
//		}
//		$result = $querytoexec->get_result();
//		if ($result->num_rows > 0) {
//			$rows = array();
//			while ($row = mysqli_fetch_assoc($result)) {
//				$temp = new Product($row["ProductName"], $row["UnitPrice"], $row["Customizable"], $row["SellerId"]);
//				$temp->setId($row["id"]);
//				$rows[] = $temp;
//			}
//		} else {
//			echo "Empty\n";
//			return null;
//		}
//
//		//TODO
//		$querytoexec->close();
//		$db->close();
//	}

	public function getByCategoryId($categoryId) {

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$db->close();
	}

	public function getAll(){

		$conn = new Connection();
		$db = $conn->getConnection();

		if ($db->connect_error) {
			die("Connection failed: " . $db->connect_error);
		}
		$querytoexec = $db->prepare("SELECT * FROM ".$this->table_name."");
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

	public function insert($product){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO

		$db->close();
	}

	public function delete($id){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$db->close();
	}

	public function update($product){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$db->close();
	}

	public function searchProduct($string){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$db->close();
	}
}
?>