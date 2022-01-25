<?php

require_once("includes/header.php");


?>
<html lang="it">
<link rel="stylesheet" href="css/chiSiamoStyle.css">
<body class="body">
<div class="display-6 fw-bold py-3 text-center"> Elaborato Tecnologie Web 2021-2022</div>
<div class="container mt-4" id="main-content">
    <div class="row">
    <div class="col-lg-4 my-lg-0 my-md-1">
    <div class="aside">
        <div class="h4 text-black text-center">Tecnologie Utilizzate</div>
        <ul class="tecnologie">
                <li>
                        <div class="d-flex px-3">
                            <div class="link">HTML5</div>
                        </div>
                </li>
                <li>
                        <div class="d-flex px-3">
                            <div class="link">CSS3</div>
                        </div>
                </li>
                <li>
                        <div class="d-flex px-3">
                            <div class="link">BOOTSTRAP</div>
                        </div>
                </li>
                <li>
                        <div class="d-flex px-3">
                            <div class="link">PHP</div>
                        </div>
                </li>
                <li>
                        <div class="d-flex px-3">
                            <div class="link">JAVASCRIPT</div>
                        </div>
                </li>
                <li>
                        <div class="d-flex px-3">
                            <div class="link">MYSQL</div>
                        </div>
                    </a>
                </li>
                <li>
                        <div class="d-flex px-3 figma">
                            <div class="link">FIGMA</div>
                        </div>
                    </a>
                </li>
            </ul>
        
    </div>
    </div>
        <div class="col-lg-8 my-lg-0 my-1">
            <div class="d-flex flex-column div-presentazione">
            <h3 class="text-center mb-4">Presentazione</h3>
            <p>Il progetto consiste nella realizzazione di una piattaforma di Delivery di torte e prodotti di pasticceria nel Campus di
                Cesena.</br>Il nome della piattaforma è <em><b>Pastecceroo</b></em>.</br></br>La piattaforma permette ai clienti di:</p>
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
                        <p> Aggiungere i prodotti al carrello</p> 
                    </li>
                    <li>
                        <p>Effettuare degli ordini</p> 
                    </li>
                </ul>
                <p>Le funzionalità per i venditori sono:</p>
                <ul class="presentazione">
                    <li>
                        <p>Visualizzare il riepilogo ordini</p> 
                    </li>
                    <li>
                        <p>Gestire i prodotti (aggiornare, aggiungere, modificare)</p> 
                    </li>
                </ul>

                <p>Ogni volta che un <b>Cliente</b> effettua un ordine si attiva un sistema simulato di notifiche che lo tiene aggiornato sullo stato dell'ordine e tramite il quale, una volta ricevuto il prodotto, possono confermare la ricezione del medesimo.</br>Queste notifiche appaiono anche al <b>Venditore</b> ogni volta che arriva la richiesta di un ordine e che viene confermata la sua consegna. Inoltre, il venditore riceve notifiche ogni volta che un suo prodotto termina nel magazzino.</p>

                <p>Tutti i <a href="https://www.figma.com/file/fjFtReDUXLz3AsotjEdGGv/Untitled?node-id=1%3A4">Mockup</a> sono stati realizzati in Figma (seguire il link per visualizzarli), inoltre all'interno del progetto sono state utilizzate varie risorse esterne come: 
                <a href="https://drawkit.com/">Drawkit</a>, <a href="https://icons.getbootstrap.com/">Bootstrap Icon</a>, <a href="https://undraw.co/illustrations">UnDrow</a>, <a href="https://unsplash.com/">UnSplash</a> e tanti altri.         
            </p>
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
