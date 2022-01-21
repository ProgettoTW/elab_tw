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
        <div class="col-lg-5 p-4">
                        <h2 class="mb-4">Aggiungi un prodotto:</h2>
                        <form class="form-inline" action="venditoreRiepilogo.php" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nome</span>
                                <input type="text" class="form-control" placeholder="Nome prodotto" name="nome" aria-label="name" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Descrizione</span>
                                <input type="text" class="form-control" placeholder="Descrizione" name="descrizione" aria-label="descrizione" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">€</span>
                                <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount" name="prezzo" class="form-control" placeholder="Prezzo">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Quantità</span>
                                <input type="number" min="1" step="1" value="1" id="exampleInputAmount" name="quantita" class="form-control" placeholder="Quantità">
                            </div>
                            <?php
                                $allCat = $categories->getAll(); ?>
                            <select type="number" class="form-select mb-3" name="categoria" id="autoSizingSelect">
                                <option selected disabled>Categoria</option>
                               <?php
                               if (!is_null($allCat)) {
                                foreach ($allCat as $row) { ?>
                                <option value="<?php echo $row->getId(); ?>"><?php echo $row->getName(); ?></option>
                                    <?php
                                }
                                } ?>
                            </select>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01" name="immagine">Immagine prodotto</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>
                            <button class="btn btn-success" type="submit">Aggiungi</button>
                        </form>
                    </div>
                </div>
        </main>
<?php
require_once("includes/footer.php");
?>
</body>

</html>