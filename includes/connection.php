<?php

class Connection
{
    public $conn;
    private string $server = "127.0.0.1";
    private string $user = "root";
    private string $pass = "";
    private string $db = "progettotw_new";

    public function getConnection()
    {
        $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db) or die("Sorry, can't connect to the mysql.");
        return $this->conn;
    }
}