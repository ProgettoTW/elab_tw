<?php
require_once("header.php");

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p'];
    if (login($email, $password, $db) == true) {
        echo "LOGIN OK";
        ?>
        <meta http-equiv="refresh" content="0;url=../index.php">
        <?php
    } else {
        ?>

        <h4 class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> L'email o la password non
            corrispondono</h4>
        // IMMAGINE ERRORE
        <a class="btn btn-primary" href="../login_module.php">Torna indietro</a>
        <?php
    }
} else {
    //Variabili sbagliate
    echo 'Invalid Request';
}

?>
