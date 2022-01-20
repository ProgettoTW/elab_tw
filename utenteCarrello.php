<?php

require_once("includes/header.php");
require_once("includes/session.php");
require_once("includes/connection.php");
require_once("cart_manager.php");
require_once("categories.php");
require_once("products.php");
require_once("model/product.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
//altri require


if (isset($_SESSION['user_id'], $_SESSION['cart_id'])) {
    $userId = $_SESSION['user_id'];
    $cartId = $_SESSION['cart_id'];
} else  {
//TODO REDIRECT SE SESSIONE NON È CREATA
}

$cartmanager = new CartManager();
$products = new ProductDB();

if(isset($_POST['add'])){
    $productId = intval($_POST['add']);
    if ($cartmanager->isInCart($productId, $userId)){
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $row[0]->getQuantity()+1;
        $cartmanager->updateQuantity($row[0]->getId(), $quantity);
    } else {
        $item = new Cart_item($productId, 1, $cartId);
        $cartmanager->insertItem($item);
    }
} else if(isset($_POST['remove'])) {
    $productId = intval($_POST['remove']);
    if ($cartmanager->isInCart($productId, $userId)){
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $row[0]->getQuantity()+1;
        $cartmanager->updateQuantity($row[0]->getId(), 0);
    } else {
        echo ("Il prodotto non è nel carrello");
    }
} else if (isset($_POST['quantity'], $_POST['product_id'])){
    $productId = $_POST['product_id'];
    if ($cartmanager->isInCart($productId, $userId)){
        $row = $cartmanager->getByProductId($productId, $userId);
        $quantity = $_POST['quantity'];
        $cartmanager->updateQuantity($row[0]->getId(), $quantity);
    }
} else if (isset($_POST['empty'])){
    $cartmanager->emptyCart($userId);
}
?>
<html lang="it">
        <?php
        require_once("includes/utente.php");
        ?>
        <div class="d-flex justify-content-center fw-bold h3 ">Carrello</div>
        <div class="checkout-container py-5">
          <div class="row g-5">
            <!--CARRELLO-->
            <div class="col-md-5 col-lg-4 order-md-last">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Il tuo carrello</span>
                <span class="badge bg-primary rounded-pill">3</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Torta alla fragola</h6>
                    <small class="text-muted">Quantità: 1</small>
                  </div>
                    <div>
                        <button class="btn w-20 btn-group-sm btn-danger btn-sm">  -  </button>
                    </div>
                  <span class="text-muted">€ 12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Biscotto al cioccolato</h6>
                    <small class="text-muted">Quantità: 6</small>
                  </div>
                  <span class="text-muted">€ 8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Muffin tradizionale</h6>
                    <small class="text-muted">Quantità: 2</small>
                  </div>
                  <span class="text-muted">€ 5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                  <div class="text-success">
                    <h6 class="my-0">Offerta compleanno</h6>
                    <small>TANTI AUGURI</small>
                  </div>
                  <span class="text-success">−50%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Totale (EUR)</span>
                  <strong>€ 12.5</strong>
                </li>
              </ul>
      
              <form class="card p-2">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Promo code">
                  <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
              </form>
            </div>
            <!--INDIRIZZO DI FATTURAZIONE-->
            <div class="col-md-7 col-lg-8">
              <form class="needs-validation" novalidate="">     
                <h4 class="mb-3">Pagamento: </h4>       
                <div class="my-3">
                  <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                    <label class="form-check-label" for="credit">Carta di credito</label>
                  </div>
                  <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                    <label class="form-check-label" for="debit">Carta di debito</label>
                  </div>
                  <div class="form-check">
                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                    <label class="form-check-label" for="paypal">PayPal</label>
                  </div>
                </div>
      
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="cc-name" class="form-label">Nome sulla carta</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                    <small class="text-muted">Nome del proprietario della carta</small>
                    <div class="invalid-feedback">
                      Il nome è obbligatorio.
                    </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="cc-number" class="form-label">Numero della carta</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="XXXX XXXX XXXX XXXX" required="">
                    <div class="invalid-feedback">
                      Il numero della carta è obbligatorio.
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cc-expiration" class="form-label">Scadenza</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="XX/XX" required="">
                    <div class="invalid-feedback">
                      La scadenza della carta è obbligatoria.
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="XXX" required="">
                    <div class="invalid-feedback">
                      Il CVV è obbligatorio
                    </div>
                  </div>
                </div>
      
                <hr class="my-4">
      
                <button class="w-100 btn btn-primary btn-lg" type="submit">Acquista</button>
              </form>
            </div>
          </div>
        </div>

<?php
require_once("includes/footer.php");
?>
</body>

</html>