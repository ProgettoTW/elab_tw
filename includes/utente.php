<?php
if (!login_check($db)) {
    //TODO: DECOMMENTARE QUI SOTTO DOPO AVER FINITO DI LAVORARE ALLE PAGINE UTENTE
    ?>
    <!-- <meta http-equiv="refresh" content="0;url=login_page.php"> -->
    <?php
}
?>

<?php if($bday){
        ?>
    <link rel="stylesheet" href="css/utenteCompleannoStyle.css">
    <?php
    } else {?>
    <link rel="stylesheet" href="css/utenteStyle.css">
    <?php
    }
    ?>
<div class="col-lg-3 my-lg-0 my-md-1">
            <div class="aside">
                <div class="h4 text-white">Profilo</div>
                <ul>
                    <li>
                        <a href="utenteRiepilogo.php" class="d-flex">
                            <div class="icon"><i class="bi bi-boxes"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Riepilogo</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="utenteProfilo.php" class="d-flex">
                            <div class="icon"><i class="bi bi-person-lines-fill"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Profilo</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="utenteOrdini.php" class="d-flex">
                            <div class="icon"><i class="bi bi-shop-window"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Ordini</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="utenteCarrello.php" class="d-flex">
                            <div class="icon"><i class="bi bi-cart-dash"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Carrello</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="utenteSupporto.php" class="d-flex">
                            <div class="icon"><i class="bi bi-info-lg"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Supporto</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./includes/logout.php" class="d-flex">
                            <div class="icon"><i class="bi bi-door-open"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Disconnetti</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>