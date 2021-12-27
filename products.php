<?php
include_once("model/product.php");
include_once("includes/connection.php");

class ProductDB {

	private $table_name = "products";

	public function getById($productId) {

		$conn = new Connection();
		$db = $conn->getConnection();
		if ($db->connect_error) {
			die("Connection failed: " . $db->connect_error);
		}
		$querytoexec = $db->prepare("SELECT * FROM ".$this->Product." WHERE id = ?");
		$querytoexec->bind_param("i", $ProductId);
		$result = $querytoexec->execute();
		if (!$result){
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

		//TODO
		$stmt->close();
		$db->close();
	}

	public function getByCategoryId($categoryId) {

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}

	public function getAll(){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}

	public function insert($product){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}

	public function delete($id){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}

	public function update($product){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}

	public function searchProduct($string){

		$conn = new Connection();
		$db = $conn->getConnection();

		//TODO
		$stmt->close();
		$db->close();
	}
}
?>
