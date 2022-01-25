<?php

require_once("includes/header.php");
require_once("includes/sendOrderEmail.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/notification.php");
require_once("order_manager.php");
require_once("notifications.php");
require_once("user_manager.php");

$products = new ProductDB();
$orders = new OrderManager();
$notificationMan = new NotificationManager();
$usermanager = new UserManager();

if (isset($_POST['ricevuto'])) {
    $idToUpdate = $_POST['ricevuto'];
    $status = "Consegnato";
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
                <?php
                $orderlist = $orders->getOrdersByUserId($_SESSION['email']);
                if (!is_null($orderlist)) { ?>
                <div class="text-uppercase">Tutti gli ordini</div>
                <form method="post" action="utenteOrdini.php" name="changestatus">
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

</html>