<?php
require_once("products.php");
require_once("categories.php");
require_once("includes/header.php");
require_once("cart_manager.php");
require_once("images.php");
require_once("model/image.php");


$products = new ProductDB();
$categories = new CategoryDB();
$cartmanager = new CartManager();
$images = new ImageDB();

$allCats = $categories->getAll();

if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['email'];
    $cartId = $_SESSION['cart_id'];
    $bday = false;
    if (isset($_SESSION['bday'])) {
        $bday = bday_check();
    }

}

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

}


?>
<html lang="it">


<?php if ($bday) {
    ?>
    <link rel="stylesheet" href="css/listaProdottiCompleannoStyle.css">
    <?php
} else { ?>
    <link rel="stylesheet" href="css/listaProdottiStyle.css">
    <?php
}
?>
<body class="bg-light">
<?php
require_once("includes/toasts.php");
?>
<!-- Container -->
<div class="container-fluid" id="main-content">
    <main>
        <!-- FILTER NAVS-->
        <nav>
            <ul class="nav nav-pills filters justify-content-center" id="myTab" role="tablist">

                <li class="nav-item filter" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-selected="true">Tutti i Prodotti
                    </button>
                </li>
                <?php
                if (!is_null($allCats)) {
                    foreach ($allCats as $row) {
                        $name = $row->getName(); ?>
                        <li class="nav-item filter" role="presentation">
                            <button class="nav-link" id="<?php echo $name; ?>-tab" data-bs-toggle="tab"
                                    data-bs-target="#<?php echo $name; ?>" type="button"
                                    role="tab" aria-selected="false"><?php echo $name; ?>
                            </button>
                        </li>
                        <?php
                    }
                } ?>
            </ul>
        </nav>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <form method="post" action="products_list.php">
                    <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-around mx-0">
                        <?php
                        $allProducts = $products->getAll();
                        if (!is_null($allProducts)) {
                            foreach ($allProducts as $row) {
                                $quantity = $row->getQuantity();
                                $img = $images->getById($row->getId())[0]; ?>
                                <div class="col">
                                    <div class="card text-center">
                                        <img src="<?php echo $img->getUrl(); ?>" class="card-img-top card-image"
                                             alt="<?php echo $img->getAlt(); ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row->getName(); ?></h5>
                                            <p class="card-text">Prezzo: <?php echo $row->getPrice(); ?> €</p>
                                            <?php
                                            if (login_check($db)) {
                                                if ($quantity > 0) {
                                                    ?>
                                                    <button class="btn btn-primary" name="add" type="submit"
                                                            value="<?php echo $row->getId(); ?>">Aggiungi al Carrello
                                                    </button>
                                                    <?php
                                                } else { ?>
                                                    <button class="btn btn-outline-secondary" name="add" type="button"
                                                            value="esaurito">ESAURITO
                                                    </button>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } ?>
                    </div>
                </form>

            </div>
            <?php
            if (!is_null($allCats)) {
                foreach ($allCats as $row1) {
                    $name = $row1->getName();
                    $ID = $row1->getId();
                    ?>
                    <div class="tab-pane fade" id="<?php echo $name; ?>" role="tabpanel"
                         aria-labelledby="<?php echo $name; ?>-tab">
                        <form method="post" action="products_list.php">
                            <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-around px-5">
                                <?php
                                $temp = $products->getByCategoryId($ID);
                                if (!is_null($temp)) {
                                    foreach ($temp as $row) {
                                        $quantity = $row->getQuantity();
                                        $img1 = $images->getById($row->getId())[0]; ?>
                                        <div class="col">
                                            <div class="card text-center">
                                                <img src="<?php echo $img1->getUrl(); ?>"
                                                     class="card-img-top card-image"
                                                     alt="<?php echo $img1->getAlt(); ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row->getName(); ?></h5>
                                                    <p class="card-text">Prezzo: <?php echo $row->getPrice(); ?> €</p>
                                                    <?php
                                                    if (login_check($db)) {
                                                        if ($quantity > 0) {
                                                            ?>
                                                            <button class="btn btn-primary" name="add" type="submit"
                                                                    value="<?php echo $row->getId(); ?>">Aggiungi al
                                                                Carrello
                                                            </button>
                                                            <?php
                                                        } else { ?>
                                                            <button class="btn btn-outline-secondary" name="add"
                                                                    type="button"
                                                                    value="esaurito">ESAURITO
                                                            </button>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } ?>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            } ?>
        </div>


    </main>
    <?php
    require_once("includes/footer.php");
    if (isset($_POST['add'])) {
        ?>
        <script>
            $('.toast').toast();
            $('#aggCart').toast('show');</script>
        <?php

    }
    ?>
</div>
</body>
</html>
