<?php
require_once("includes/header.php");
require_once("includes/sendOrderEmail.php");
require_once("products.php");
require_once("categories.php");
require_once("order_manager.php");
require_once("user_manager.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");

$products = new ProductDB();
$orders = new OrderManager();
$manager = new UserManager();

if (!admin_check($db)){
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
<?php
}

if (isset($_POST['consegna'])) {
    $idToUpdate = $_POST['consegna'];
    $orders->setOrderStatus($idToUpdate,"In Consegna");
    $email = $orders->getOrderOwnerId($idToUpdate);
    $name = $manager->getUserName($email);
    //THIS IS FOR DEBUG
    $resultMail = orderSent("luca.vombato@gmail.com",$idToUpdate,$name);
    //THIS IS DEFINITIVE
    //$resultMail = orderSent($email,$idToUpdate,$name);
}

?>
<html lang="it">
<body class="body">
<div class="container mt-4">
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
                                        <div class="status">Stato: <?php $ordStatus = $orders->getOrderStatus($order->getId());
                                        echo $ordStatus;?></div>
                                        <?php
                                        if ($ordStatus == "Ricevuto"){
                                            ?>
                                            <button class="btn btn-primary" name="consegna" value="<?php echo $order->getId(); ?>" type="submit">Completato</button>
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