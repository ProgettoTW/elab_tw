<?php
class Connection{
    private $server="127.0.0.1";
    private $user="mysql";
    private $pass="password1234";
    private $db="progettotw";
	public $conn;

	public function getConnection(){

		$this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db) or die("Sorry, can't connect to the mysql.");
    return $this->conn;

	}
}
?>
