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
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
            style=""></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleUtenti.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Pastecceroo</title>
</head>

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
                    <a class="nav-link active" aria-current="page" href="index.php">Pagina iniziale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="products_list.php">Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="chiSiamo.php">Chi Siamo</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex input-group">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search"/>
                        <span class="input-group-text border-0">
                  <i class="bi bi-search"></i>
                </span>
                    </form>
                </li>
            </ul><?php if (login_check($db)) { ?>
            <div class="dropdown"><b><?php if (admin_check($db)) {
                        echo "ADMIN";
                    } ?>
            <ul class="navbar-nav auth">
                <li class="nav-item">
                    <?php if (admin_check($db)) {
                        ?>
                        <a href="venditoreRiepilogo.php"><i class="bi bi-person"></i></a>
                    <?php
                    } else{?>
                        <a href="utenteRiepilogo.php"><i class="bi bi-person"></i></a>
                   <?php }?>

                </li>
            </ul>
            <?php
            } else { ?>
                <ul class="navbar-nav auth">
                    <li class="nav-item">
                        <a href="login_page.php">
                            <button type="button" class="btn btn-secondary">Accedi/Registrati</button>
                        </a>
                    </li>
                </ul>
                <?php
            } ?>
        </div>
    </nav>
</div>



