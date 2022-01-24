<?php

require_once("includes/header.php");
require_once("products.php");
require_once("categories.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");

$products = new ProductDB();
$categories = new CategoryDB();

if (!admin_check($db)){
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
<?php
}
if (isset($_POST['nome'], $_POST['descrizione'], $_POST['categoria'], $_POST['prezzo'], $_POST['quantita'])){
    $prod = new Product($_POST['nome'], $_POST['prezzo'], $_POST['descrizione'], 0, $_POST['categoria'], $_POST['quantita']);
    $prodId = $products->insert($prod);
}
if (isset($_POST['aggiorna'], $_POST['prezzo'], $_POST['quantita'], $_POST['ID'])){
    $products->updatePriceQuant($_POST['prezzo'], $_POST['quantita'], $_POST['ID']);
}

if(isset($_POST['rimuovi'], $_POST['ID'])){
    $products->delete($_POST['ID']);
}



?>
<html lang="it">
<body class="body">
<div class="container mt-4" id="main-content">
    <div class="row">
    <?php
    require_once("includes/venditore.php");
    ?>
        <div class="col-lg-6 my-lg-0 my-1">
        <div class="main-content">
            <div class="d-flex my-4 flex-column">
                <div class="h5 d-flex mb-4">Supporto Pastecceroo</div>
                <p>Problemi con la consegna?</p>
                <p>Hai bisogno di cambiare dati personali?</p>
                <p>Dolci salati alla consegna?</p>
                <div class="h5 d-flex flex-column mb-4">
                    <p>Invia una email <br> Pastecceroo ti risponderà nel minor tempo possibile!</p>
                    <hr>
                    <address><a href="mailto:pastecceroo@gmail.com">pastecceroo@gmail.com</a></address>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    </div>    
</div>
</body>
<?php
require_once("includes/footer.php");
?>
</body>

</html>