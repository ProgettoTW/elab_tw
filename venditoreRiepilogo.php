<?php

require_once("includes/header.php");
require_once("products.php");
require_once("model/cart.php");
require_once("model/cart_item.php");


$products = new ProductDB();

?>
<html lang="it">
        <main>
        <div class="row d-flex">
                    <!--I TUOI PRODOTTI-->
                    <div class="col-lg-7 p-4">
                        <h2 class="mb-4">I tuoi prodotti:</h2>
                        <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Prodotto</th>
                                <th scope="col">Quantità</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Rimuovi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Torta al limone</td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" value="1" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Rimuovi</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Torta al cioccolato</td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" value="1" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Rimuovi</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Torta alla fragola</td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" value="1" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Rimuovi</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">1</th>
                                <td>Torta ai frutti di bosco</td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" value="1" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Rimuovi</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">1</th>
                                <td>Torta al tiramisù</td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" value="1" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">Rimuovi</button>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--AGGIUNGI UN PRODOTTO-->
                    <div class="col-lg-5 p-4">
                        <h2 class="mb-4">Aggiungi un prodotto:</h2>
                        <form class="form-inline">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nome</span>
                                <input type="text" class="form-control" placeholder="Nome prodotto" aria-label="name" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">€</span>
                                <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                            </div>
                            <select class="form-select mb-3" id="autoSizingSelect">
                                <option selected disabled>Categoria</option>
                                <option value="1">Torta</option>
                                <option value="2">Muffin</option>
                                <option value="3">Biscotto</option>
                            </select>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Immagine prodotto</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <button type="button" class="btn btn-success">Aggiungi</button>
                        </form>
                    </div>
                </div>
        </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>