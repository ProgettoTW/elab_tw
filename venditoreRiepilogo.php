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
        <main>
        <?php
        require_once("includes/venditore.php");
        ?>
        <!-- PAGINA SPEDIZIONI-->
        </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>