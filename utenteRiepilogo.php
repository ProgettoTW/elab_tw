<?php

require_once("includes/header.php");
require_once("includes/sendOrderEmail.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/notification.php");
require_once("notifications.php");
require_once("cart_manager.php");
require_once("order_manager.php");
require_once("user_manager.php");

$products = new ProductDB();
$orders = new OrderManager();
$cartmanager = new CartManager();
$notificationMan = new NotificationManager();
$usermanager = new UserManager();
$orderlist = $orders->getOrdersByUserId($_SESSION['email']);
$cartList = $cartmanager->getCartItems($_SESSION['email']);


if (isset($_POST['ricevuto'])) {
    $idToUpdate = $_POST['ricevuto'];
    $status = "Consegnato";
    $email = $_SESSION['email'];
    $orders->setOrderStatus($idToUpdate, $status);
    $date = new DateTime('NOW');
    $now = $date->format('Y-m-d H:i:s');

    $allAdmins = $usermanager->getAllAdmin();
    foreach ($allAdmins as $admin) {
        $tmpNot = new Notification($admin, $now, $status);
        $notificationMan->insert($tmpNot);
        if (!orderReceived($admin, $idToUpdate)) {
            echo "Errore nell'invio della mail";
        }
    }

    if (orderReceived($email, $idToUpdate)) {
        $tmpNot = new Notification($email, $now, $status);
        $notificationMan->insert($tmpNot);
    } else {
        echo "Errore nell'invio della mail";
    }
}


?>
<html lang="it">
<body class="body">
<div class="container mt-4" id="main-content">
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
                            <div class="ms-auto number"><?php if (is_null($cartList)) {
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
                            <div class="ms-auto number"><?php if (is_null($orderlist)) {
                                    echo "Nessuno";
                                } else {
                                    echo count($orderlist);
                                }; ?></div>
                        </div>
                    </div>
                </div>
                <div class="text-uppercase">Ordini Recenti</div>
                <form method="post" action="utenteRiepilogo.php" name="changestatus">
                    <?php
                    if (!is_null($orderlist)) {
                        if (count($orderlist) > 2) {
                            $lastorders = array_slice($orderlist, 0, 2);
                        } else {
                            $lastorders = $orderlist;
                        }
                        foreach ($lastorders as $order) {

                            ?>
                            <div class="order my-3 bg-light">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex flex-column justify-content-between order-summary">
                                            <div class="d-flex align-items-center">
                                                <div class="text-uppercase">Nr.Ordine
                                                    #<?php echo $order->getId(); ?></div>
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
                                            <div class="status">
                                                Stato: <?php $ordStatus = $orders->getOrderStatus($order->getId());
                                                echo $ordStatus; ?></div>
                                            <?php
                                            if ($ordStatus == "In Consegna") {
                                                ?>
                                                <button class="btn btn-primary" name="ricevuto"
                                                        value="<?php echo $order->getId(); ?>" type="submit">Conferma
                                                    Ricezione
                                                </button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
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