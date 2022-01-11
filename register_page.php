<?php

require_once("includes/header.php");



?>

<link rel="stylesheet" href="/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="/js/register_module.js"></script>
<script src="/js/jquery_validation_messages.js"></script>

    <h1 class="page_title">Registrati</h1>
    <form action="http://localhost/elab_tw/includes/register.php" method="post" target="_parent" name="register_page" id="register_page">
      <fieldset>
        <div class="row">
            <div class="form-group">
              <label for="name">Nome</label>
              <input class="form-control" id="nome" type="text" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
              <label for="cognome">Cognome</label>
              <input class="form-control" id="cognome" type="text" name="cognome" placeholder="Cognome">
            </div>
            <div class="form-group">
              <label for="indirizzo">Indirizzo</label>
              <input class="form-control" id="autocomplete" placeholder="Indirizzo" onFocus="geolocate()" type="text" name="Indirizzo"></input>
            </div>

            <div class="form-group">
              <label for="data">Data di Nascita</label>
                <input type="data" name="born_date"
                       value="2000-01-01"
                       min="1990-01-01" max="2020-12-31">
            </div>

            <div class="form-group">
              <label for="telefono">Telefono</label>
              <input class="form-control" id="telefono" type="text" name="telefono" placeholder="3312345678">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" id="email" type="email" name="email" placeholder="email@email.com">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" id="password" type="password" name="p">
              <small id="passwordHelpBlock" class="form-text text-muted">
               Almeno 8 caratteri, una maiuscola e un numero.
              </small>
            </div>

            <div class="form-group">
              <label for="conferma_password">Conferma Password</label>
              <input class="form-control" id="conferma_password" type="password" name="conferma_password">
            </div>

          <button id="register_button" class="btn btn-primary" type="submit">Registrati</button>
        </div>
      </fieldset>
    </form>

    <script>

      //TODO Autocomplete script? Fattibile, devo guardarci, ora non mi va...
    </script>
