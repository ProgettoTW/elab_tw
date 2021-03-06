<?php

require_once("includes/header.php");
require_once("includes/session.php");
require_once("includes/connection.php");
require_once("cart_manager.php");
require_once("categories.php");
require_once("products.php");
require_once("model/product.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
//altri require


if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['user_id'];
    $cartId = $_SESSION['cart_id'];
} else { ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}

$cartmanager = new CartManager();
$products = new ProductDB();

if (isset($_POST['add'])) {
    $productId = intval($_POST['add']);
    if ($cartmanager->isInCart($productId, $userId)) {
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $row[0]->getQuantity() + 1;
        $cartmanager->updateQuantity($row[0]->getId(), $quantity);
    } else {
        $item = new Cart_item($productId, 1, $cartId);
        $cartmanager->insertItem($item);
    }
} else if (isset($_POST['remove'])) {
    $productId = intval($_POST['remove']);
    if ($cartmanager->isInCart($productId, $userId)) {
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $row[0]->getQuantity() + 1;
        $cartmanager->updateQuantity($row[0]->getId(), 0);
    } else {
        echo("Il prodotto non è nel carrello");
    }
} else if (isset($_POST['quantity'], $_POST['product_id'])) {
    $productId = $_POST['product_id'];
    if ($cartmanager->isInCart($productId, $userId)) {
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $_POST['quantity'];
        $cartmanager->updateQuantity($row[0]->getId(), $quantity);
    }
} else if (isset($_POST['empty'])) {
    $cartmanager->emptyCart($userId);
}
?>
    <html>
    <h1> BOOOH ROBA HTML QUI</h1>
    </html>

<?php
require_once("includes/footer.php");

