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

<div class="py-5 align-items-center d-flex">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 px-md-5">
                <h1 class="display-3 mb-4">Giornata Pesante?</h1>
                <p class="lead mb-4">Rilassati con qualche dolce!<br></p> <a href="#" class="btn btn-lg btn-primary">Vai
                    allo Shop!</a>
            </div>
            <div class="col-md-6"><img class="img-fluid d-block" src="img/img1.jpg"></div>
        </div>
    </div>
</div>
<div class="text-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-3">Gusta i tuoi dolci direttamente al Campus!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12"><a href="#" class="text-muted">
                    <i class="fa fa-fw fa-facebook fa-2x mx-3"></i>
                </a> <a href="#" class="text-muted">
                    <i class="fa fa-fw fa-twitter fa-2x mx-3"></i>
                </a> <a href="#" class="text-muted">
                    <i class="fa fa-fw fa-2x fa-google-plus mx-3"></i>
                </a> <a href="#" class="text-muted">
                    <i class="fa fa-fw fa-instagram fa-2x mx-3"></i>
                </a></div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img class="img-fluid d-block" src="img/img2.jpg"></div>
            <div class="col-md-6">
                <div class="px-md-5 p-3 col-md-12 d-flex flex-column align-items-start justify-content-center">
                    <h1>Lorem Ipsum</h1>
                    <p class="mb-3 lead">Boh non so che scrivere qui... Aggiungiamo qualche descrizione? Qualche aiuto
                        per scegliere i dolci?</p>
                    <div class="row">
                        <div class="col-md-12"><i class="fa fa-stop-circle fa-3x mr-3 text-muted d-inline"></i> <i
                                    class="fa fa-circle-o fa-3x mx-3 text-muted d-inline"></i> <i
                                    class="fa fa-stop-circle-o fa-3x mx-3 text-muted d-inline"></i> <i
                                    class="fa fa-circle fa-3x ml-3 text-muted d-inline"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main>
    <div class="first-image d-flex justify-content-center">
    </div>
    <div class="text d-flex flex-column text-center">
    </div>
</main>
<footer class="text-center text-lg-start bg-dark text-muted">
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h3 class="text-uppercase fw-bold my-4">Pastecceroo</h3>
                    <p> Compagnia di consegna di dolci per studenti e docenti presso l'Alma Mater Studiorum - Università
                        di Bologna - Campus di Cesena <br> <br> Scopri centinaia di prodotti artigianali prodotti dalle
                        migliori Pasticcerie della zona. <br> <br> Inserisci la data di nascita corretta, al tuo
                        compleanno riceverai una torta da gustare con chi vuoi! </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h3 class="text-uppercase fw-bold my-4"> Prodotti </h3>
                    <p>
                        <a href="#!" class="text-reset">Torte</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Biscotti</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Capcakes</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Brownie</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h3 class="text-uppercase fw-bold my-4">Contatti</h3>
                    <p>Via Cesare Pavese, 50, 47521 Cesena FC</p>
                    <p>infoPastecceroo@example.com</p>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright text-center p-4"> © 2021 Copyright: <a class="text-reset fw-bold" href="index.html">Pastecceroo.it</a>
    </div>
</footer>

</body>

</html>
</html>