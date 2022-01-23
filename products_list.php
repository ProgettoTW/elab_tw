<?php
include_once("products.php");
include_once("categories.php");
include_once("includes/header.php");


$products = new ProductDB();
$categories = new CategoryDB();
$allCats = $categories->getAll();
?>
<html lang="it">

<link rel="stylesheet" href="css/listaProdottiStyle.css">

<body class="bg-light">
<!-- Container -->
<div class="container-fluid">
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
                <form method="post" action="utenteCarrello.php">
                    <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-around mx-0">
                        <?php
                        $allProducts = $products->getAll();
                        if (!is_null($allProducts)) {
                            foreach ($allProducts as $row) {
                                $quantity = $row->getQuantity(); ?>
                                <div class="col">
                                    <div class="card text-center">
                                        <img src="img/products/<?php echo $row->getId(); ?>.jpg" class="card-img-top card-image"
                                             alt="Foto di <?php echo $row->getName(); ?>">
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
                                                    <button class="btn btn-light" name="add" type="button"
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
                    $ID = $row1->getId(); ?>
                    <div class="tab-pane fade" id="<?php echo $name; ?>" role="tabpanel"
                         aria-labelledby="<?php echo $name; ?>-tab">
                        <form method="post" action="utenteCarrello.php">
                            <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-around px-5">
                                <?php
                                $temp = $products->getByCategoryId($ID);
                                if (!is_null($temp)) {
                                    foreach ($temp as $row) {
                                        $quantity = $row->getQuantity(); ?>
                                        <div class="col">
                                            <div class="card text-center">
                                                <img src="img/products/<?php echo $row->getId(); ?>.jpg"
                                                     class="card-img-top"
                                                     alt="Foto di <?php echo $row->getName(); ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $row->getName(); ?></h5>
                                                    <p class="card-text">Prezzo: <?php echo $row->getPrice(); ?> €</p>
                                                    <?php
                                                    if ($quantity > 0) {
                                                        ?>
                                                        <button class="btn btn-primary" name="add" type="submit"
                                                                value="<?php echo $row->getId(); ?>">Aggiungi al
                                                            Carrello
                                                        </button>
                                                        <?php
                                                    } else { ?>
                                                        <button class="btn btn-light" name="add" type="button"
                                                                value="esaurito">ESAURITO
                                                        </button>
                                                        <?php
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
    ?>
</div>
</body>
</html>
