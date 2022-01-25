<?php

setlocale(LC_TIME, "it-IT");

require_once("session.php");
require_once("connection.php");
require_once("notifications.php");
sec_session_start();

$conn = new Connection();
$db = $conn->getConnection();
$notifications = new NotificationManager();


$bday = bday_check();
$notFlag = $notifications->getUnreadByUser($_SESSION['email']);
if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['user_id'];
    $cartId = $_SESSION['cart_id'];
}


?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"
            style=""></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <?php if ($bday) {
        ?>
        <link rel="stylesheet" href="css/compleannoTest.css">
        <?php
    } else { ?>
        <link rel="stylesheet" href="css/headerStyle.css">
        <?php
    }
    ?>
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

<div class="header justify-content-evenly px-4">
    <a type="button" class="btn btn-light visually-hidden-focusable" href="#main-content">Vai al contenuto
        principale</a>
    <nav class="navbar navbar-expand-lg text-uppercase navbar-dark">

        <?php
        if ($bday) {

            ?>
            <img src="img/balloons.png" alt="" width="40" style="-webkit-transform: scaleX(-1); transform: scaleX(-1);">
            <a class="navbar-brand" href="index.php">
                <h1 class="h1">Pastecceroo</h1>
            </a>
            <img src="img/balloons.png" alt="" width="40">
            <?php

        } else {
            ?>
            <a class="navbar-brand" href="index.php">
                <h1 class="h1">Pastecceroo</h1></a>
            <?php
        }
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-between" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto content">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Pagina iniziale</a>
                </li>
                <?php if (!admin_check($db)) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="products_list.php">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="chiSiamo.php">Chi Siamo</a>
                    </li>
                <?php } ?>
            </ul><?php if (login_check($db)) { ?>
            <div class="dropdown">
                <ul class="navbar-nav auth">
                    <?php if (!admin_check($db)) {
                        ?>
                        <li class="nav-item">
                            <a class="bi bi-cart3" href="utenteCarrello.php"><span
                                        class="visually-hidden">Carrello</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="bi bi-bell<?php if ($notFlag) {
                            echo "-fill";
                        } ?>" href="utenteNotifiche.php"><span
                                    class="visually-hidden">Notifiche</span></a>
                    </li>
                    <li class="nav-item">

                        <?php if (admin_check($db)) {
                            ?>
                            <a class="bi bi-speedometer2" href="venditoreRiepilogo.php"><span class="visually-hidden">Profilo Venditore</span></a>
                            <?php
                        } else { ?>
                            <a class="bi bi-person" href="utenteRiepilogo.php"><span class="visually-hidden">Profilo utente</span></a>
                        <?php } ?>

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



