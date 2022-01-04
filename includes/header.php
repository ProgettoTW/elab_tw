<?php

setlocale(LC_TIME, "it-IT");

require_once("session.php");
require_once("connection.php");
sec_session_start();

$conn = new Connection();
$db = $conn->getConnection();


if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['user_id'];
    $cartId = $_SESSION['cart_id'];
}

?>
<!-- TODO: Questo CSS è solo per testare il dropdown, altrimenti faccio un pastrocchio
 -->

<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<!DOCTYPE html>

<!--
        SESSION CHECK
-->
    <b>Test Session:</b>
<?php if (login_check($db)){ ?>
   <div class="dropdown"><?php echo $_SESSION['nome']; ?> - <b><?php if (admin_check($db)) {echo "ADMIN";} ?>
           <div class="dropbtn">Menu</div>
           <div class="dropdown-content">
            <?php if (admin_check($db)){ ?>
                <a href="#">Pagina amministratore</a>
            <?php } ?>
            <a href="#">Il mio account</a>
            <a href="#">I miei ordini</a>
            <a href="#"> - </a>
            <a href="#">Logout</a>
            </div>
   </div>
    <?php
} else { ?>
        <a href="register_page.php">Registrati</a>

        <a href="login_page.php">Login</a>
    <?php
} ?>