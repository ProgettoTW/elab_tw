<?php
require_once("session.php");
require_once("connection.php");
sec_session_start();

$conn = new Connection();
$db = $conn->getConnection();

if (isset($_POST['emailLogin'], $_POST['passwordLogin'])) {
    $email = $_POST['emailLogin'];
    $password = $_POST['passwordLogin'];
    if (login($email, $password, $db)) {
        echo "LOGIN OK";
        if(bday_check()){ ?>
            <meta http-equiv="refresh" content="0;url=../compleanno.html">
            <?php
        } else {
            ?>
            <meta http-equiv="refresh" content="0;url=../index.php">
                <?php
        }
        ?>
        <?php
    } else {
        ?>

        <h4 class="text-danger"><i class="bi bi-exclamation-triangle" aria-hidden="true"></i> L'email o la password non
            corrispondono</h4>
        <a class="btn btn-primary" href="../login_module.php">Torna indietro</a>
        <?php
    }
} else {
    //Variabili sbagliate
    echo 'Invalid Request';
}

?>
