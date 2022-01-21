<?php
if (!login_check($db)){
    //TODO: DECOMMENTARE QUI SOTTO DOPO AVER FINITO DI LAVORARE ALLE PAGINE UTENTE
?>
<!-- <meta http-equiv="refresh" content="0;url=login_page.php"> -->
<?php
}
?>
<<<<<<< Updated upstream
<link rel="stylesheet" href="css/utenteStyle.css">

=======
      <div class="container mt-4">
        <div class="row">
>>>>>>> Stashed changes
          <div class="col-lg-3 my-lg-0 my-md-1">
            <div class="aside">
              <div class="h4 text-white">Profilo</div>
                <ul class>
                      <li> 
                          <a href="venditoreRiepilogo.php" class="d-flex">
                              <div><i class="bi bi-folder"></i></div>
                                <div class="d-flex px-3">
                                  <div class="link">Riepilogo</div>
                                </div>
                          </a> 
                        </li>
                      <li> 
<<<<<<< Updated upstream
                        <a href="venditoreGestioneProdotti.php" class="d-flex">
                            <div><i class="bi bi-clipboard-plus"></i></div>
                                <div class="d-flex px-3">
                                  <div class="link">Gestione Prodotti</div>
=======
                        <a href="venditoreAggiungiProdotti.php" class="d-flex">
                            <div><i class="bi bi-clipboard-plus"></i></div>
                                <div class="d-flex px-3">
                                  <div class="link">Aggiungi</div>
>>>>>>> Stashed changes
                                </div>
                            </a> 
                      </li>
                      <li> 
<<<<<<< Updated upstream
                        <a href="venditoreSupporto.php" class="d-flex">
=======
                        <a href="utenteSupporto.php" class="d-flex">
>>>>>>> Stashed changes
                          <div><i class="bi bi-info-lg"></i></div>
                              <div class="d-flex px-3">
                                <div class="link">Supporto</div>
                              </div>
                          </a> 
                      </li>
                      <li> 
                        <a href="./includes/logout.php" class="d-flex">
                          <div><i class="bi bi-door-open"></i></div>
                              <div class="d-flex px-3">
                                <div class="link">Disconnetti</div>
                              </div>
                          </a> 
                      </li>
                 </ul>
              </div>
            </div>
<<<<<<< Updated upstream
=======
            </div>
>>>>>>> Stashed changes
