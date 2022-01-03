<?php
include_once("products.php");
include_once("includes/header.php");

$products = new ProductDB();
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <script src="js/nav_scripts.js" type="text/javascript"></script>
    <title>Delivery - Prodotti</title>
</head>
<body>
    <header class="header">
        <button onclick="openNav()" id="hamburger">&#9776;</button>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
          </div>
        <div class="text-box">
            <h1>Pastecceroo</h1>
        </div>

    </header>
    <main>
        <section class="page-type">
            <h2 class="products">Prodotti</h2>
            <?php $rows = $products->getAll();
    ?>
        </section>
        <section class="categories filters">
            <ul>
                <li>Categorie</li>
                <li>Filtri</li>
            </ul>
        </section>

        <section class="prodotti">
          <?php
          if (!is_null($rows)){
          foreach ($rows as $row) { ?>
            <div class="prodotto">
                <img src="img/cupcakes.jpg" alt="cupcakes">
                <a href="#"><?php echo $row->getName(); ?></a>
                <p>descrizione</p>
                <p class="prezzo">Prezzo: <?php echo $row->getPrice();?>€</p>
            </div>
            <?php
            }
            } ?>
        </section>
    </main>
    <footer class="footer">

            <ul>
                <li><a href="#">Contatti</a></li>
                <li><a href="#">Chi Siamo</a></li>
                <li><a href="#">Accedi</a></li>
                <li><a href="#">Carrello</a></li>
            </ul>

    </footer>
</body>
</html>
