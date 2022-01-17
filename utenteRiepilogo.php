<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");

$products = new ProductDB();

?>
<html lang="it">
        <main>
        <?php
        require_once("includes/utente.php");
        ?>
            <div class="col-lg-9 my-lg-0 my-1">
              <div class="main-content">
                  <div class="d-flex my-4 flex-column">
                      <div class="h5">Ciao nome,</div>
                      <div>Accesso effettuato con: email@gmail.com</div>
                  </div>
                  <div class="d-flex flex-wrap">
                    <div class="box m-4 bg-light"> 
                      <img src="./img/shopping-cart-remove-svgrepo-com.svg" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Prodotti nel carrello</div>
                            <div class="ms-auto number">108383</div>
                        </div>
                    </div>
                      <div class="box m-4 bg-light"> 
                        <img src="./img/delivery-svgrepo-com.svg" alt="">
                          <div class="d-flex align-items-center mt-2">
                              <div class="tag">Ordini Effettuati</div>
                              <div class="ms-auto number">10</div>
                          </div>
                      </div>
                   </div>
                <div class="text-uppercase">Ordini Recenti</div>
                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <div class="text-uppercase">Nr.Ordine #0001</div>
                                    <div class="blue-label ms-auto text-uppercase">Pagato</div>
                                </div>
                                <div>Prodotti #03</div>
                                <div>22 Agosto, 2022 | 12:05</div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Stato : Ricevuto</div>
                                <div class="btn btn-primary text-uppercase">info ordine</div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="order my-3 bg-light">
                      <div class="row">
                          <div class="col-lg-4">
                              <div class="d-flex flex-column justify-content-between order-summary">
                                  <div class="d-flex align-items-center">
                                      <div class="text-uppercase">Nr.Ordine #0001</div>
                                      <div class="blue-label ms-auto text-uppercase">Pagato</div>
                                  </div>
                                  <div>Prodotti #03</div>
                                  <div>22 Agosto, 2022 | 12:05</div>
                              </div>
                          </div>
                          <div class="col-lg-8">
                              <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                  <div class="status">Stato : Ricevuto</div>
                                  <div class="btn btn-primary text-uppercase">info ordine</div>
                              </div>
                          </div>
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
</body>

</html>