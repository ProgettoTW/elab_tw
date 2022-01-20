<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("user_manager.php");

$products = new ProductDB();
$manager = new UserManager();

if (isset($_POST['old_pw'], $_POST['new_pw'], $_SESSION['email'])) {
    //Check new change
    $result = $manager->setnewPass($_SESSION['email'], $_POST['new_pw']);
    if (!$result) {
        echo "AO c'è stato un errore nel cambiare psw forse non era giusta o forse ho rotto qualcosa";
    }
}


?>
<html lang="it">
<main>
    <?php
    require_once("includes/utente.php");
    ?>
    <div class="col-lg-6 my-lg-0 my-1">
        <div class="main-content">
            <form action="utenteProfilo.php" method="post" name="edit_pw" id="edit_pw">
                <div class="d-flex my-4 flex-column">

                    <div class="h5 d-flex justify-content-center mb-4">Modifica la password e salva</div>
                    <div class="d-flex fw-bold my-4">Credenziali</div>
                    <div class="form-group mb-3">
                        <label for="vecchia_pw" class="h6">Vecchia password</label>
                        <input type="password" name="old_pw" class="form-control" id="vecchia_pw"
                               placeholder="Inserisci la vecchia password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nuova_pw" class="h6">Nuova password</label>
                        <input type="password" name="new_pw" class="form-control" id="nuova_pw"
                               placeholder="Inserisci la nuova password">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Conferma</button>
                </div>
            </form>
        </div>

    </div>
</main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>