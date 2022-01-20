<?php

class AdminConnection
{
    public $conn;
    private $server = "127.0.0.1";
    private $user = "admin";
    private $pass = "";
    private $db = "progettotw";

    public function getConnection()
    {
        $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db) or die("Sorry, can't connect to the mysql.");
        return $this->conn;
    }
}

?>