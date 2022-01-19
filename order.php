<?php
require_once("includes/header.php");
require_once("includes/session.php");
require_once("includes/connection.php");
require_once("model/order.php");
require_once("model/order_item.php");
require_once("model/product.php");
require_once("products.php");
require_once("cart_manager.php");
require_once("cart.php");

function newOrderFromCart($cartId, $userId)
{
    $order = new Order($userId);
    $orderMan = new OrderManager();
    $orderId = $orderMan->insertOrder($order);
    $cartmanager = new CartManager();
    $items = $cartmanager->getCartItems($userId);
    //Check if items are null
    if (!is_null($items)) {
        $orderItems = array();
        foreach ($items as $item) {
            $temp = new Order_Item($item->getProductId(), $item->getQuantity(), $order->getId());
            $temp->setId($item->getId());
            $orderItems[] = $temp;
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
if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['user_id'];
    $cartId = $_SESSION['cart_id'];
} else  {
    ?>
    <meta http-equiv="refresh" content="0;url=login_page.php">
<?php
}

$ordermanager = new OrderManager();
$products = new ProductDB();

if (isset($_POST['ordina'])){
    $orderId = newOrderFromCart($cartId, $userId);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 mx-auto bg-light colonna modulo_colonna" >
                <h4 class="text-success"><i class="fa fa-check" aria-hidden="true"></i>L'ordine è stato effettuato!</h4>
                <h1>ORDINE OK!</h1>
                <a class="btn btn-primary" href="/index.php">Torna alla Home</a>
    <?php
} else {
    echo "Errore!";
}




