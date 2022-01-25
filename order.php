<?php
require_once("includes/header.php");
require_once("includes/session.php");
require_once("includes/connection.php");
require_once("includes/sendOrderEmail.php");
require_once("model/order.php");
require_once("model/order_item.php");
require_once("model/product.php");
require_once("model/notification.php");
require_once("products.php");
require_once("cart_manager.php");
require_once("order_manager.php");
require_once("user_manager.php");
require_once("notifications.php");


function newOrderFromCart($cartId, $userId)
{
    $order = new Order($userId);
    $orderMan = new OrderManager();
    $orderId = $orderMan->insertOrder($order);
    $cartmanager = new CartManager();
    $products = new ProductDB();
    $usermanager = new UserManager();
    $notificationMan = new NotificationManager();

    $items = $cartmanager->getCartItems($userId);
    //Check if items are null
    if (!is_null($items)) {
        $orderItems = array();
        foreach ($items as $item) {
            $temp = new Order_Item($item->getProductId(), $item->getQuantity(), $orderId);
            $temp->setId($item->getId());
            $temp->setProductName($item->getProductName());
            $orderItems[] = $temp;
            $products->removeQuant($item->getQuantity(), $item->getProductId());
            if ($products->isTerminatd($item->getProductId())) {
                $date = new DateTime('NOW');
                $now = $date->format('Y-m-d H:i:s');
                $allAdmins = $usermanager->getAllAdmin();
                foreach ($allAdmins as $admin) {
                    $tmpNot = new Notification($admin, $now, "Articolo Terminato! Nome: " . $item->getProductName());
                    $notificationMan->insert($tmpNot);
                    if (!prodottoTerminato($admin, $item->getProductName())) {
                        echo "Errore nell'invio della mail";
                    }
                }
            }
        }
        foreach ($orderItems as $orderItem) {
            $orderMan->insertItem($orderItem);
        }
        $cartmanager->emptyCart($userId);

        return $orderId;
    }

    return null;

}

//Session check
if (isset($_SESSION['email'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['email'];
    $cartId = $_SESSION['cart_id'];
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=login_page.php">
    <?php
}

$ordermanager = new OrderManager();
$products = new ProductDB();
$usermanager = new UserManager();
$notificationManager = new NotificationManager();

require_once("includes/toasts.php");
?>
    <body class="body">
    <main>
        <?php
        if (isset($_POST['ordina'])) {
        $orderId = newOrderFromCart($cartId, $userId);
        if (orderCreated("pasticceroo@protonmail.com", $orderId, $_SESSION['name'])) {
            ?>
            <script>
                $('.toast').toast();
                $('#ordCreato').toast('show');</script>
            <?php
            $date = new DateTime('NOW');
            $now = $date->format('Y-m-d H:i:s');
            $allAdmins = $usermanager->getAllAdmin();
            foreach ($allAdmins as $admin) {
                $tmpNot = new Notification($admin, $now, "Pagato");
                $notificationManager->insert($tmpNot);
                if (!orderCreatedToAdmin($admin, $cartId)) {
                    echo "Errore nell'invio della mail";
                }
            }
        } else {
            echo "Errore nell'invio della mail";
        }


        ?>
        <div class="py-3 align-items-center d-flex">
            <div class="container" id="main-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 mx-auto bg-light colonna modulo_colonna">
                        <h4 class="text-success"><i class="bi bi-check" style="color: #135661" aria-hidden="true"></i>L'ordine
                            è stato inviato!</h4>
                        <hr>
                        <a class="btn btn-primary" href="index.php">Torna alla Home</a>
                        <?php
                        } else {
                            echo "Errore!";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
<?php
require_once("includes/footer.php");


