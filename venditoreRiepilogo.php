<?php
require_once("includes/header.php");
require_once("includes/sendOrderEmail.php");
require_once("products.php");
require_once("categories.php");
require_once("order_manager.php");
require_once("user_manager.php");
require_once("notifications.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");
require_once("model/notification.php");

$products = new ProductDB();
$orders = new OrderManager();
$manager = new UserManager();
$notificationMan = new NotificationManager();

if (!admin_check($db)) {
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

if (isset($_POST['consegna'])) {
    $idToUpdate = $_POST['consegna'];
    $status = "In Consegna";
    $orders->setOrderStatus($idToUpdate, $status);
    $email = $orders->getOrderOwnerId($idToUpdate);
    $name = $manager->getUserName($email);
    $date = new DateTime('NOW');
    $now = $date->format('Y-m-d H:i:s');
    $tmpNot = new Notification($email, $now, $status);
    $notificationMan->insert($tmpNot);
    if (!orderSent($email, $idToUpdate, $name)) {
        echo "Errore nell'invio della mail";
    }
}

?>
<html lang="it">
<body class="body">
<div class="container mt-4" id="main-content">
    <div class="row">
        <?php
        require_once("includes/venditore.php");
        ?>
        <div class="col-lg-9 my-lg-0 my-1">
            <div class="main-content">
                <?php
                $orderlist = $orders->getAllOrders();
                if (!is_null($orderlist)) { ?>
                    <div class="text-uppercase">Tutti gli ordini</div>
                    <form method="post" action="venditoreRiepilogo.php" name="changestatus">
                        <?php
                        foreach ($orderlist as $order) {

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
                                            if ($ordStatus == "Ricevuto") {
                                                ?>
                                                <button class="btn btn-primary" name="consegna"
                                                        value="<?php echo $order->getId(); ?>" type="submit">Completato
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
                        ?>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- PAGINA ORDINI-->
</body>
<?php
require_once("includes/footer.php");
?>
</body>

</html>