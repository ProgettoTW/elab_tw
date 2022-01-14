<?php
include_once("products.php");
include_once("includes/header.php");

$products = new ProductDB();
?>
<html lang="it">
</head>


<body class="bg-light">
<!-- Container -->
<div class="container-fluid">
    <main>
        <!-- FILTER NAVS-->
        <nav>
            <?php $rows = $products->getAll();
            ?>
            <ul class="nav nav-pills filters justify-content-center" id="myTab" role="tablist">

                <li class="nav-item filter" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                            type="button" role="tab" aria-selected="true">Tutti i Prodotti
                    </button>
                </li>
                <li class="nav-item filter" role="presentation">
                    <button class="nav-link" id="torte-tab" data-bs-toggle="tab" data-bs-target="#torte" type="button"
                            role="tab" aria-selected="false">Torte
                    </button>
                </li>
                <li class="nav-item filter" role="presentation">
                    <button class="nav-link" id="biscotti-tab" data-bs-toggle="tab" data-bs-target="#biscotti"
                            type="button" role="tab" aria-selected="false">Biscotti
                    </button>
                </li>
            </ul>
        </nav>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">

                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    if (!is_null($rows)) {
                        foreach ($rows as $row) { ?>
                            <div class="col">
                                <div class="card text-center">
                                    <img src="img/products/<?php echo $row->getId() ?>.jpg" class="card-img-top"
                                         alt="asd">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row->getName(); ?></h5>
                                        <p class="card-text">Prezzo: <?php echo $row->getPrice(); ?> €</p>
                                        <a href="#" class="btn btn-primary">Aggiungi al Carrello</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>
                </div>

            </div>
            <div class="tab-pane fade" id="torte" role="tabpanel" aria-labelledby="torte-tab">

                <div class="row row-cols-1 row-cols-md-4 g-4">

                    <div class="col">
                        <div class="card text-center">
                            <img src="./img/muffin_tradizionale.jpg" class="card-img-top" alt="asd">
                            <div class="card-body">
                                <h5 class="card-title">Muffin Tradizionale</h5>
                                <p class="card-text">Prezzo: 42 €</p>
                                <a href="#" class="btn btn-primary">Aggiungi al Carrello</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="biscotti-tab">

                <div class="row row-cols-1 row-cols-md-4 g-4">

                    <div class="col">
                        <div class="card text-center">
                            <img src="./img/biscotto_gocce.jpg" class="card-img-top" alt="asd">
                            <div class="card-body">
                                <h5 class="card-title">Biscotto con Gocce di Cioccolato</h5>
                                <p class="card-text">Prezzo: 42 €</p>
                                <a href="#" class="btn btn-primary">Aggiungi al Carrello</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </main>
    <?php
    require_once("includes/footer.php");
    ?>
</div>
</body>
</html>
