<?php

require_once("includes/connection.php");
require_once("includes/session.php");

class UserManager
{


    private $users_table = "users";

    public function getUserName($email){
        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT name FROM " . $this->users_table . " WHERE email = ? LIMIT 1");
        $querytoexec->bind_param('s', $email);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "Error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
            }
        } else {
            echo "Non ho il nome di questo utente!";
            return null;
        }
        $querytoexec->close();
        $db->close();
        return $name;



    }

    public function setnewPass($email, $newPsw)
    {
        $conn = new Connection();
        $db = $conn->getConnection();
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        if (login_check($db)) {

            $newPsw = password_hash($newPsw, PASSWORD_DEFAULT);
            $querytoexec = $db->prepare("UPDATE " . $this->users_table . " SET password = ? WHERE email = ?");
            $querytoexec->bind_param('ss', $newPsw, $email);
            if (!$querytoexec->execute()) {
                echo($querytoexec->error);
            }
            $result = $querytoexec->get_result();

            $querytoexec->close();
            $db->close();
            return true;
        }
        return false;
    }

    public function getPhone($email)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT phone FROM " . $this->users_table . " WHERE email = ? LIMIT 1");
        $querytoexec->bind_param('s', $email);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "Error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            //got phone number
            while ($row = mysqli_fetch_assoc($result)) {
                $phone = $row["phone"];
            }
        } else {
            echo "Non ho trovato il numero di telefono!";
            return null;
        }
        $querytoexec->close();
        $db->close();
        return $phone;

    }

    public function getAllAdmin(){

        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $querytoexec = $db->prepare("SELECT * FROM " . $this->users_table . " WHERE admin = 1");
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;

        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = $row['email'];
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

}