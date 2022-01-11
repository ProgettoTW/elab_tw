<?php
include('session.php');
sec_session_start();
$_SESSION = array(); //delete session values
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]); //delete cookies
session_destroy(); //delete session
header('Location: /index.php');
?>
