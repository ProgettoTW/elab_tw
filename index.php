<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");

$products = new ProductDB();

?>
<html lang="it">

<body class="body">
<!-- Container -->
<link rel="stylesheet" href="css/indexStyle.css">
<div class="py-3 align-items-center d-flex">
    <div class="container" id="main-content">
        <div class="row flex-md-row-reverse">
            <div class="col-md-6"><img class="img-fluid d-block" src="img/img1.jpg" alt=""></div>
            <div class="text col-md-6 text-center my-auto">
                <div><h1 class="mt-5">Giornata Pesante?</h1></div>
                <div><p class=" mb-4">Rilassati con qualche dolce!<br></p> </div>
                <a href="products_list.php" id="shop"class="btn-shop">Vai allo Shop!</a>
            </div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
        <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Scegli tra centinaia di prodotti</h2>
                </div>
        </div>
            <div class="col-md-6"><img class="img-fluid d-block" src="img/img2.jpg" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row">
        <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Aggiungili al Carrello</h2>
                </div>
        </div>
            <div class="col-md-6"><img class="img-fluid d-block" src="img/img3.jpg" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
        <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Gusta i tuoi dolci direttamente al Campus</h2>
                </div>
        </div>
            <div class="col-md-6"><img class=" img2 img-fluid d-block" src="img/img6.jpg" alt=""></div>
        </div>
    </div>
</div>
</div>
<?php
require_once("includes/footer.php");
?>
</body>

</html>