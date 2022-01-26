<?php
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
                    <meta http-equiv="refresh" content="0;url=../index.php"> <?php
                } else {
                    echo "prepare error";
                }
                $insert_stmt->close();
            }
        } else { ?>
            <!DOCTYPE html>
            <html lang="en">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
            <div class="page-wrap d-flex flex-row align-items-center" style="margin 3%;">
                <div class="container" style="background-color: #156470; border-radius: 10px; margin-top: 5%;">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center mt-5 py-5" style="color: white;">
                            <div class="display-1 bi bi-emoji-frown"></div>
                            <span class="display-1 d-block">Errore!</span>
                            <div class="mb-4 lead">Questa mail è già stata registrata!</div>
                            <a class="btn btn-danger mb-5" href="../login_page.php">Torna indietro</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "prepare error";
    }
    $update_stmt->close();
    $db->close();
} else { ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <div class="page-wrap d-flex flex-row align-items-center" style="margin 3%;">
        <div class="container" style="background-color: #156470; border-radius: 10px; margin-top: 5%;">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mt-5 py-5" style="color: white;">
                    <div class="display-1 bi bi-emoji-frown"></div>
                    <span class="display-1 d-block">Errore!</span>
                    <div class="mb-4 lead">Non hai compilato tutti i campi!</div>
                    <a class="btn btn-danger mb-5" href="../login_page.php">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>