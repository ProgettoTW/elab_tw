<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("cart_manager.php");
require_once("order_manager.php");


$products = new ProductDB();
$orders = new OrderManager();
$cartmanager = new CartManager();
$orderlist = $orders->getOrdersByUserId($_SESSION['email']);
$cartList = $cartmanager->getCartItems($_SESSION['email']);

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
            <div class="d-flex my-4 flex-column">
                <div class="h5">Ciao <?php echo $_SESSION['name']; ?>,</div>
                <div>Accesso effettuato con: <?php echo $_SESSION['email']; ?></div>
            </div>
            <div class="d-flex flex-wrap">
                <div class="box m-4 bg-light">
                    <img src="./img/shopping-cart-remove-svgrepo-com.svg" alt="">
                    <div class="d-flex align-items-center mt-2">
                        <div class="tag">Prodotti nel carrello</div>
                        <div class="ms-auto number"><?php if(is_null($cartList)){
                            echo "Nessuno";
                        } else {
                            echo count($cartList);
                        } ?></div>
                    </div>
                </div>
                <div class="box m-4 bg-light">
                    <img src="./img/delivery-svgrepo-com.svg" alt="">
                    <div class="d-flex align-items-center mt-2">
                        <div class="tag">Ordini Effettuati</div>
                        <div class="ms-auto number"><?php echo count($orderlist); ?></div>
                    </div>
                </div>
            </div>
            <div class="text-uppercase">Ordini Recenti</div>
            <?php
            if(!is_null($orderlist)){
                if(count($orderlist) > 2){
                    $lastorders = array_slice($orderlist, 0, 2);
                } else {
                    $lastorders = $orderlist;
                }
                foreach ($lastorders as $order){

            ?>
            <div class="order my-3 bg-light">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex flex-column justify-content-between order-summary">
                            <div class="d-flex align-items-center">
                                <div class="text-uppercase">Nr.Ordine #<?php echo $order->getId(); ?></div>
                                <div class="blue-label ms-auto text-uppercase">Pagato</div>
                            </div>
                            <div>Numero Prodotti: <?php
                                echo $orders->getOrderItemsNum($order->getId());
                                ?></div>
                            <div><?php echo $order->getTime(); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                            <div class="status">Stato: <?php echo $orders->getOrderStatus($order->getId()); ?></div>
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
    </div>
</div>
</body>
<?php
require_once("includes/footer.php");
?>
</body>

</html>