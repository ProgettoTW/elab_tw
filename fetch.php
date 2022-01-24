<?php

require_once("includes/session.php");
require_once("includes/connection.php");
require_once("notifications.php");
require_once("model/notification.php");
sec_session_start();

$conn = new Connection();
$db = $conn->getConnection();
$notifications = new NotificationManager();

$userId = $_SESSION['email'];
$rows = $notifications->getUnreadByUser($userId);
$notifications->setAllSeen($userId);
$notifs = array();

foreach ($rows as $row) {
    $time = date("H:i", $row->getDatetime());
    $status = $row->getStatus();
    $temp->time = $time;
    $temp->status = $status;
    $notifs[] = $temp;
}
$count = count($notifs);
$data = array(
    'notifs' => $notifs,
    'count'  => $count
);

echo json_encode($data);