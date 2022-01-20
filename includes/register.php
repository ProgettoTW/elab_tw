<?php
require_once("header.php");
require_once("session.php");
require_once("connection.php");

sec_session_start();

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['born_date']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['p'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $surname = $_POST['surname'];
    $password = $_POST['p'];
    $born_date = $_POST['born_date'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $conn = new Connection();
    $db = $conn->getConnection();
    if ($update_stmt = $db->prepare("SELECT email FROM users WHERE email = ?")) {
        $update_stmt->bind_param('s', $email);
        $update_stmt->execute();
        $update_stmt->store_result();
        if ($update_stmt->num_rows < 1) {
            $address = "EMPTY";
            if ($insert_stmt = $db->prepare("INSERT INTO users (name, surname, phone, address, date, email, password, admin) VALUES (?, ?, ?, ?, ?, ?, ?, 0)")) {
                $insert_stmt->bind_param('sssssss', $name, $surname, $phone, $address, $born_date, $email, $hashed_password);
                // Esegui la query ottenuta.
                $insert_stmt->execute();

                $user_id = mysqli_stmt_insert_id($insert_stmt);
                if ($insert_stmt2 = $db->prepare("INSERT INTO cart (email, status) VALUES (?, ?)")) {
                    $status = "NEW";
                    $insert_stmt2->bind_param('ss', $email, $status);
                    // Esegui la query ottenuta.
                    $insert_stmt2->execute();
                    $insert_stmt2->close();
                    ?>
                    <div class="container-fluid">
                    <div class="row">
                    <div>Registrazione completata!</div>
                    <a class="btn btn-primary" href="../login_page.php">Vai al login</a> <?php
                } else {
                    echo "prepare error";
                }
                $insert_stmt->close();
            }
        } else { ?>
            <div class="container-fluid">
            <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 mx-auto bg-light" >
            <h4> Questa mail è già registrata!</h4>
            <a class="btn btn-primary" href="../login_page.php">Torna indietro</a>
            <?php
        }
    } else {
        echo "prepare error";
    }
    $update_stmt->close();
    $db->close();
} else { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 mx-auto bg-light">
                <h4> Non hai compilato tutti i campi!</h4>
                <a class="btn btn-primary" href="/login_page.php">Torna indietro</a>
    <?php
}
?>