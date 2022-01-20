<?php

require_once("includes/header.php");
require_once("products.php");
require_once("categories.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");

$products = new ProductDB();
$categories = new CategoryDB();

if (!admin_check($db)){
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
<?php
}
if (isset($_POST['nome'], $_POST['descrizione'], $_POST['categoria'], $_POST['prezzo'], $_POST['quantita'])){
    $prod = new Product($_POST['nome'], $_POST['prezzo'], $_POST['descrizione'], 0, $_POST['categoria'], $_POST['quantita']);
    $prodId = $products->insert($prod);
}
if (isset($_POST['aggiorna'], $_POST['prezzo'], $_POST['quantita'], $_POST['ID'])){
    $products->updatePriceQuant($_POST['prezzo'], $_POST['quantita'], $_POST['ID']);
}

if(isset($_POST['rimuovi'], $_POST['ID'])){
    $products->delete($_POST['ID']);
}



?>
<html lang="it">
        <main>
        <?php
        require_once("includes/venditore.php");
        ?>
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
                                <th scope="col">Aggiorna</th>
                                <th scope="col">Rimuovi</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $allProducts = $products->getAll();
                            if (!is_null($allProducts)) {
                                $count = 1;
                            foreach ($allProducts as $row) { ?>
                              <tr>
                                  <form class="form-inline" action="venditoreRiepilogo.php" method="post">
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row->getName(); ?></td>
                                      <input type="hidden" name="ID" value="<?php echo $row->getId(); ?>">
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">Q.tà</span>
                                      <input type="number" min="0" step="1" name="quantita" value="<?php echo $row->getQuantity(); ?>" id="exampleInputAmount" class="form-control" placeholder="Quantità">
                                  </div>  
                                </td>
                                <td>
                                  <div class="input-group mb-3 w-75">
                                    <span class="input-group-text" id="basic-addon1">€</span>
                                      <input type="number" min="0.00" step="0.01" name="prezzo" value="<?php echo $row->getPrice(); ?>" id="exampleInputAmount" class="form-control" placeholder="Prezzo">
                                  </div>
                                </td>
                                  <td>
                                      <button type="submit" class="btn btn-primary" name="aggiorna" value="aggiorna">Aggiorna</button>
                                  </td>
                                <td>
                                    <button type="submit" class="btn btn-danger" name="rimuovi" value="rimuovi">Rimuovi</button>
                                </td>
                                  </form>
                              </tr>
                                <?php
                                $count++;
                            }
                            } ?>
                            </tbody>
                        </table>

                    </div>
        </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>