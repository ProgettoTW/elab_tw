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
<div class="header justify-content-evenly px-4">
    <nav class="navbar navbar-expand-lg text-uppercase navbar-dark">
        <a class="navbar-brand" href="#">
            <h1 class="h1">Pastecceroo</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-between" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto content">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Pagina iniziale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="prodotti.html">Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="chiSiamo.html">Chi Siamo</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex input-group">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search"/>
                        <span class="input-group-text border-0">
                  <i class="bi bi-search"></i>
                </span>
                    </form>
                </li>
            </ul>
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
            <ul class="navbar-nav auth">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary">Accedi</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-secondary">Registrati</button>
                </li>
            </ul>
                <?php
            } ?>
        </div>
    </nav>
</div>
