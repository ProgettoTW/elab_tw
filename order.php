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
        }
        if (!orderCreated($_SESSION['email'], $orderId, $_SESSION['name'])) {
            echo "Errore nell'invio della mail";
        }
        if (!orderCreatedToAdmin($admin, $cartId)) {
            echo "Errore nell'invio della mail";
        }


        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <div class="page-wrap d-flex flex-row align-items-center" style="margin 3%;">
            <div class="container" style="background-color: #ffffff; border-radius: 10px; margin-top: 5%;">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center mt-5 py-5" style="color: white;">
                        <div class="display-1 bi bi-check" style="color: #75CB00"></div>
                        <h2 class="text-success">L'ordine
                            ?? stato inviato!</h2>
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


