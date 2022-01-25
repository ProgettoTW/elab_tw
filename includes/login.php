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
        if (bday_check()) { ?>
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <div class="page-wrap d-flex flex-row align-items-center" style="margin 3%;">
            <div class="container" style="background-color: #156470; border-radius: 10px; margin-top: 5%;">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center mt-5 py-5" style="color: white;">
                        <div class="display-1 bi bi-emoji-frown"></div>
                        <span class="display-1 d-block">Errore!</span>
                        <div class="mb-4 lead">L'email o la password non corrispondono!</div>
                        <a class="btn btn-danger mb-5" href="../login_page.php">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    //Variabili sbagliate
    echo 'Invalid Request';
}

?>
