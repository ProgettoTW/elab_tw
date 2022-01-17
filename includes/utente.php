<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");

$products = new ProductDB();

?>
<html lang="it">

      <div class="container mt-4">
        <div class="row">
          <div class="col-lg-3 my-lg-0 my-md-1">
            <div class="aside">
              <div class="h4 text-white">Profilo</div>
                <ul>
                      <li> 
                          <a href="utenteRiepilogo.php" class="d-flex">
                              <div><i class="bi bi-boxes"></i></div>
                                <div class="d-flex px-3">
                                  <div class="link">Riepilogo</div>
                                </div>
                          </a> 
                        </li>
                      <li> 
                        <a href="utenteProfilo.php" class="d-flex">
                            <div><i class="bi bi-person-lines-fill"></i></div>
                                <div class="d-flex px-3">
                                  <div class="link">Profilo</div>
                                </div>
                            </a> 
                      </li>
                      <li> 
                        <a href="utenteOrdini.php" class="d-flex">
                          <div><i class="bi bi-shop-window"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Ordini</div>
                              </div>
                        </a> 
                      </li>
                      <li> 
                        <a href="utenteCarrello.php" class="d-flex">
                          <div><i class="bi bi-cart-dash"></i></div>
                            <div class="d-flex px-3">
                                <div class="link">Carrello</div>
                              </div>
                        </a> 
                      </li>
                      <li> 
                        <a href="utenteSupporto.php" class="d-flex">
                          <div><i class="bi bi-info-lg"></i></div>
                              <div class="d-flex px-3">
                                <div class="link">Supporto</div>
                              </div>
                          </a> 
                      </li>
                      <li> 
                        <a href="#" class="d-flex">
                          <div><i class="bi bi-door-open"></i></div>
                              <div class="d-flex px-3">
                                <div class="link">Disconnetti</div>
                              </div>
                          </a> 
                      </li>
                 </ul>
              </div>
            </div>
            </div>
          </div>
        </div>

<?php
require_once("includes/footer.php");
?>
</body>

</html>