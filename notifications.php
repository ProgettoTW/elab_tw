<?php

require_once("model/notification.php");
require_once("includes/connection.php");

class NotificationManager
{

    private string $notTable = "notifications";

    public function getByUser($userId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->notTable . " WHERE email = ? order by time desc");
        $querytoexec->bind_param('s', $userId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Notification($row["email"], $row["time"], $row["status"]);
                $temp->setId($row["ID"]);
                $temp->setSeen($row['seen']);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;

    }

    public function getUnreadByUser($userId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->notTable . " WHERE email = ? and seen = 0 order by time desc");
        $querytoexec->bind_param('s', $userId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = new Notification($row["email"], $row["time"], $row["status"]);
                $temp->setId($row["ID"]);
                $temp->setSeen($row['seen']);
                $rows[] = $temp;
            }
        } else {
            return null;
        }

        $querytoexec->close();
        $db->close();

        return $rows;

    }

    public function insert($notification)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("INSERT INTO " . $this->notTable . " (email, time, status, seen) VALUES (?, now(), ?, 0)");
        $notUserId = $notification->getUserId();
        $notStatus = $notification->getStatus();
        $querytoexec->bind_param('ss', $notUserId, $notStatus);
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

    public function setAllSeen($userId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("UPDATE " . $this->notTable . " SET seen = 1 WHERE email = ? and seen = 0");
        $querytoexec->bind_param('s', $userId);
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

    public function checkUnseen($userId)
    {
        $conn = new Connection();
        $db = $conn->getConnection();

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $querytoexec = $db->prepare("SELECT * FROM " . $this->notTable . " WHERE email = ? AND seen = 0");
        $querytoexec->bind_param('s', $userId);
        $result = $querytoexec->execute();
        if (!$result) {
            echo "error";
            return null;
        }

        $result = $querytoexec->get_result();
        if ($result->num_rows > 0) {
            $querytoexec->close();
            $db->close();

            return true;
        } else {
            $querytoexec->close();
            $db->close();

            return false;
        }


    }

}