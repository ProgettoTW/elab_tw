<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("order_manager.php");

$products = new ProductDB();
$orders = new OrderManager();

?>
<html lang="it">
<body class="body">
<div class="container mt-4">
    <div class="row">
    <?php
    require_once("includes/utente.php");
    ?>
    <div class="col-lg-9 my-lg-0 my-1">
        <div class="main-content">
            <?php
            $orderlist = $orders->getAllOrders();
            if (!is_null($orderlist)) { ?>
                <div class="text-uppercase">Tutti gli ordini</div>
                <?php
                foreach ($orderlist as $order) {

                    ?>
                    <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Nr.Ordine #<?php echo $order->getId(); ?></div>
                                        <div class="blue-label ms-auto text-uppercase">Pagato</div>
                                    </div>
                                    <div>Prodotti #03</div>
                                    <div><?php echo $order->getTime(); ?></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Stato : Ricevuto</div>
                                    <div class="btn btn-primary text-uppercase">info ordine</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>
<?php
require_once("includes/footer.php");
?>
</body>

</html>