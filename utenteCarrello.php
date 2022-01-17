<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");

$products = new ProductDB();

?>
<html lang="it">
        <main>
        <?php
        require_once("includes/utente.php");
        ?>
        <div class="col-lg-6 my-lg-0 my-1">
        <div class="main-content">
                <div class="d-flex justify-content-center fw-bold h3 ">Carrello</div>
                
                  </div>
            </div>
    </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>