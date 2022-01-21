<?php
<<<<<<< Updated upstream
require_once("includes/header.php");
require_once("includes/sendOrderEmail.php");
require_once("products.php");
require_once("categories.php");
require_once("order_manager.php");
require_once("user_manager.php");
=======

require_once("includes/header.php");
require_once("products.php");
require_once("categories.php");
>>>>>>> Stashed changes
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");

<<<<<<< Updated upstream

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
=======
$products = new ProductDB();
$categories = new CategoryDB();

if (!admin_check($db)) {
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}
if (isset($_POST['nome'], $_POST['descrizione'], $_POST['categoria'], $_POST['prezzo'], $_POST['quantita'])) {
    $prod = new Product($_POST['nome'], $_POST['prezzo'], $_POST['descrizione'], 0, $_POST['categoria'], $_POST['quantita']);
    $prodId = $products->insert($prod);
}
if (isset($_POST['aggiorna'], $_POST['prezzo'], $_POST['quantita'], $_POST['ID'])) {
    $products->updatePriceQuant($_POST['prezzo'], $_POST['quantita'], $_POST['ID']);
}

if (isset($_POST['rimuovi'], $_POST['ID'])) {
    $products->delete($_POST['ID']);
}


?>
<html lang="it">
        <main>
        <?php
        require_once("includes/venditore.php");
        ?>
        <div class="col-lg-7 p-4">
                        <h2 class="mb-4">I tuoi prodotti:</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Prodotto</th>
                                <th scope="col">Quantità</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Aggiorna</th>
                                <th scope="col">Rimuovi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $allProducts = $products->getAll();
                            if (!is_null($allProducts)) {
                                $count = 1;
                            foreach ($allProducts as $row) { ?>
                              <tr>
                                  <form class="form-inline" action="venditoreRiepilogo.php" method="post">
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row->getName(); ?></td>
                                <input type="hidden" name="ID" value="<?php echo $row->getId(); ?>">
                                <td>
                                    <div class="input-group mb-3 w-75">
                                        <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                        <input type="number" min="0" step="1" name="quantita"
                                               value="<?php echo $row->getQuantity(); ?>" id="exampleInputAmount"
                                               class="form-control" placeholder="Quantità">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group mb-3 w-75">
                                        <span class="input-group-text" id="basic-addon1">€</span>
                                        <input type="number" min="0.00" step="0.01" name="prezzo"
                                               value="<?php echo $row->getPrice(); ?>" id="exampleInputAmount"
                                               class="form-control" placeholder="Prezzo">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="aggiorna" value="aggiorna">
                                        Aggiorna
                                    </button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" name="rimuovi" value="rimuovi">
                                        Rimuovi
                                    </button>
                                </td>
                            </form>
                        </tr>
                        <?php
                        $count++;
                    }
                } ?>
                </tbody>

        </main>
>>>>>>> Stashed changes
<?php
require_once("includes/footer.php");
?>
</body>

</html>