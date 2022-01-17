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
        <div class="col-lg-6 my-lg-0 my-1">
              <div class="main-content">
                <div class="d-flex my-4 flex-column">
                  <div class="h5 d-flex justify-content-center mb-4">Modifica il tuo profilo e salva</div>
                  <div class="d-flex fw-bold mb-3">Dettagli personali</div>
                  <div class="form-group mb-3">
                    <label for="nome" class="h6">Nome</label>
					          <input type="text" class="form-control" id="nome" placeholder="Inserisci il nome">  
                  </div>
                  <div class="form-group mb-3">
                    <label for="cognome" class="h6">Cognome</label>
					          <input type="email" class="form-control" id="cognome" placeholder="Inserisci il cognome">  
                  </div>
                  <div class="form-group mb-3">
                    <label for="email" class="h6">Email</label>
					          <input type="text" class="form-control" id="email" placeholder="Inserisci La tua email">  
                  </div>
                  <div class="d-flex fw-bold my-4">Credenziali</div>
                  <div class="form-group mb-3">
                    <label for="vecchia_pw" class="h6">Vecchia password</label>
					          <input type="password" class="form-control" id="vecchia_pw" placeholder="Inserisci la vecchia password">  
                  </div>
                  <div class="form-group mb-3">
                    <label for="nuova_pw" class="h6">Nuova password</label>
					          <input type="password" class="form-control" id="nuova_pw" placeholder="Inserisci la nuova password">  
                  </div>
                  <div class="form-group mb-3">
                    <label for="conferma_pw" class="h6">Conferma password</label>
					          <input type="password" class="form-control" id="conferma_pw" placeholder="Conferma la password inserita">  
                  </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <button type="delete" class="btn btn-default">Cancella</button>
                    <button type="submit" class="btn btn-primary">Conferma</button>
                  </div>
                </div>
            
              </div>
    </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>