<?php

require_once("includes/header.php");


?>
<html lang="it">
<link rel="stylesheet" href="css/chiSiamoStyle.css">
<link rel="stylesheet" href="css/utenteStyle.css">
<body class="body">
<div class="display-6 fw-bold py-3 text-center"> Elaborato Tecnologie Web 2021-2022</div>
<div class="container mt-4" id="main-content">
    <div class="row">
    <div class="col-lg-4 my-lg-0 my-md-1">
    <div class="aside">
        <div class="h4 text-white text-center">Tecnologie Utilizzate</div>
        <ul class="tecnologie">
                <li>
                    <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">HTML5</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">CSS3</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">BOOTSTRAP</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">PHP</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">JAVASCRIPT</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="utenteRiepilogo.php" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">MYSQL</div>
                        </div>
                    </a>
                </li>
                <li>
                <a href="https://www.figma.com/file/fjFtReDUXLz3AsotjEdGGv/Untitled?node-id=1%3A4" class="d-flex">
                        <div class="d-flex px-3">
                            <div class="link">FIGMA</div>
                        </div>
                    </a>
                </li>
            </ul>
        
    </div>
    </div>
        <div class="col-lg-8 my-lg-0 my-1">
            <div class="d-flex my-4 flex-column div-presentazione">
            <h3 class="text-center mb-4">Presentazione</h3>
            <p>Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em>Pastecceroo</em> (Pronunciato pasticcerù).</br>La piattaforma permette ai clienti di:</p>
                <ul class="presentazione">
                    <li>
                        <p>Registrarsi</p> 
                    </li>
                    <li>
                        <p>Accedere</p> 
                    </li>
                    <li>
                        <p>Visualizzare i prodotti</p> 
                    </li>
                    <li>
                        <p> Aggiungerli al carrello</p> 
                    </li>
                    <li>
                        <p>Effettuare degli ordini</p> 
                    </li>
                </ul>
                <p>Le funzionalità per i venditori sono:</p>
                <ul class="presentazione">
                    <li>
                        <p>Visualizzare riepilogo ordini</p> 
                    </li>
                    <li>
                        <p>Gestire prodotti (Aggiornare, aggiungere, modificare)</p> 
                    </li>
                </ul>

                <p>Tutti gli ordini sono accompagnati da un sistema di notifiche che permette ai <b>Clienti</b> di conoscere lo stato degli ordini e confermare la ricezione dell'ordine.</br>
            I   <b>Venditori</b>,invece, possono confermare gli ordini che arrivano, sapere quando un prodotto è arrivato a destinazione e quando nel magazzino è terminato.</p>
        </div>
                </div>
        </div>
</div>
<h2 class="text-center mt-5">Team Pastecceroo</h2>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Davide Carità</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block davide" src="img/davide.png" alt=""></div> 
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Francesco Esposito</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block fra " src="img/fra.png" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Luca Bandini</h2>
                    <p>Back-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block luca" src="img/luca.png" alt=""></div> 
        </div>
    </div>
</div>
</div>
</div>
</body>
<?php
require_once("includes/footer.php");
?>         
</html>





<div class="container">
    <div class="display-6 fw-bold py-3 text-center"> Elaborato Tecnologie Web 2021-2022</div>
    <div class="row">
        <div class="col-md-5 py-5 flex-row mt-3 div-presentazione">
            <h3 class="text-center mb-4">Presentazione</h3>
            <p>Il progetto consiste nella realizzazione di una piattaforma di Delivery di Torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em>Pastecceroo</em> (Pronunciato pasticcerù).</br>La piattaforma permette ai clienti di:</p>
                <ul class="presentazione">
                    <li>
                        <p>Registrarsi</p> 
                    </li>
                    <li>
                        <p>Accedere</p> 
                    </li>
                    <li>
                        <p>Visualizzare i prodotti</p> 
                    </li>
                    <li>
                        <p> Aggiungerli al carrello</p> 
                    </li>
                    <li>
                        <p>Effettuare degli ordini</p> 
                    </li>
                </ul>
                <p>Le funzionalità per i venditori sono:</p>
                <ul class="presentazione">
                    <li>
                        <p>Visualizzare riepilogo ordini</p> 
                    </li>
                    <li>
                        <p>Gestire prodotti (Aggiornare, aggiungere, modificare)</p> 
                    </li>
                </ul>

                <p>Tutti gli ordini sono accompagnati da un sistema di notifiche che permette ai <b>Clienti</b> di conoscere lo stato degli ordini e confermare la ricezione dell'ordine.</br>
            I   <b>Venditori</b>,invece, possono confermare gli ordini che arrivano, sapere quando un prodotto è arrivato a destinazione e quando nel magazzino è terminato.</p>
        </div>
        <div class="col-md-5 py-5 text-center mt-3 div-tecnologie">
            <h3 class="text-center mb-4">Tecnologie utilizzate</h3>
            <ul class="tecnologie">
                <li>
                    <p>HTML5</p>
                </li>
                <li>
                    <p>CSS3</p>
                </li>
                <li>
                    <p>BOOTSTRAP</p>
                </li>
                <li>
                    <p>PHP</p>
                </li>
                <li>
                    <p>JavaScript</p>
                </li>
                <li>
                    <p>MySQL</p>
                </li>
                <li>
                    <a href="https://www.figma.com/file/fjFtReDUXLz3AsotjEdGGv/Untitled?node-id=1%3A4">Figma</a>
                    <p class="figma">Clicca qui per visualizzare i mockup</p>
                </li>
            </ul>
        </div>
    </div>
    </div>
    
    <h2 class="text-center">Team Pastecceroo</h2>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Davide Carità</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block davide" src="img/davide.png" alt=""></div> 
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Francesco Esposito</h2>
                    <p>Front-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block fra " src="img/fra.png" alt=""></div>
        </div>
    </div>
</div>
<div class="py-3 align-items-center d-flex">
    <div class="container">
        <div class="row flex-md-row-reverse">
            <div class="text col-md-6 text-center my-auto">
                <div class=" py-3 col-md-12  my-auto text-center">
                    <h2 class="mb-3">Luca Bandini</h2>
                    <p>Back-end</p>
                </div>
            </div>
            <div class="col-md-4"><img class="img-fluid d-block luca" src="img/luca.png" alt=""></div> 
        </div>
    </div>
</div>