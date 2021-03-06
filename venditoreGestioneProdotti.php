<?php

require_once("includes/header.php");
require_once("products.php");
require_once("categories.php");
require_once("images.php");
require_once("model/cart.php");
require_once("model/cart_item.php");
require_once("model/category.php");
require_once("model/image.php");

$products = new ProductDB();
$categories = new CategoryDB();
$images = new ImageDB();

if (!admin_check($db)) {
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
}
if (isset($_POST['nome'], $_POST['descrizione'], $_POST['categoria'], $_POST['prezzo'], $_POST['quantita'], $_FILES['immagine'])) {
    $prod = new Product($_POST['nome'], $_POST['prezzo'], $_POST['descrizione'], 0, $_POST['categoria'], $_POST['quantita']);
    $prodId = $products->insert($prod);
    $filename = $_FILES["immagine"]["name"];
    $arr = explode(".", $filename);
    $extension = end($arr);
    if (!move_uploaded_file($_FILES['immagine']['tmp_name'], './img/products/' . $prodId . "." . $extension)) {
        echo "Errore nel caricamento dell'immagine";
    }

    $image = new Image($prodId, "img/products/" . $prodId . "." . $extension, $prod->getName());
    $images->insert($image);
}
if (isset($_POST['aggiorna'], $_POST['prezzo'], $_POST['quantita'], $_POST['ID'])) {
    $products->updatePriceQuant($_POST['prezzo'], $_POST['quantita'], $_POST['ID']);
}

if (isset($_POST['rimuovi'], $_POST['ID'])) {
    $images->delete($_POST['ID']);
    $products->delete($_POST['ID']);

}


?>
<html lang="it">
<body class="body">
<div class="container mt-4" id="main-content">
    <div class="row">
        <?php
        require_once("includes/venditore.php");
        ?>
        <div class="col-lg-9
         my-lg-0 my-1">
            <div class="main-content">
                <div class="d-flex my-4 flex-column">
                    <h2 class="mb-4">I tuoi prodotti:</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Prodotto</th>
                            <th scope="col">Quantit??</th>
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
                                    <form class="form-inline" action="venditoreGestioneProdotti.php" method="post">
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row->getName(); ?></td>
                                        <input type="hidden" name="ID" value="<?php echo $row->getId(); ?>">
                                        <td>
                                            <div class="input-group mb-3 w-75">
                                                <span class="input-group-text" id="basic-addon1">Q.t??</span>
                                                <input type="number" min="0" step="1" name="quantita"
                                                       value="<?php echo $row->getQuantity(); ?>"
                                                       id="exampleInputAmount"
                                                       class="form-control" placeholder="Quantit??">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3 w-75">
                                                <span class="input-group-text" id="basic-addon1">???</span>
                                                <input type="number" min="0.00" step="0.01" name="prezzo"
                                                       value="<?php echo $row->getPrice(); ?>" id="exampleInputAmount"
                                                       class="form-control" placeholder="Prezzo">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary" name="aggiorna"
                                                    value="aggiorna">
                                                Aggiorna
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-danger" name="rimuovi" value="rimuovi">
                                                Rimuovi
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                <?php
                                $count++;
                            }
                        } ?>
                        </tbody>
                    </table>
                    <h2 class="mb-4">Aggiungi un prodotto:</h2>
                    <form class="form-inline" action="venditoreGestioneProdotti.php" method="post"
                          enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nome</span>
                            <input type="text" class="form-control" placeholder="Nome prodotto" name="nome"
                                   aria-label="name"
                                   aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Descrizione</span>
                            <input type="text" class="form-control" placeholder="Descrizione" name="descrizione"
                                   aria-label="descrizione" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">???</span>
                            <input type="number" min="0.00" step="0.01" value="1.00" id="exampleInputAmount"
                                   name="prezzo"
                                   class="form-control" placeholder="Prezzo">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Quantit??</span>
                            <input type="number" min="1" step="1" value="1" id="exampleInputAmount" name="quantita"
                                   class="form-control" placeholder="Quantit??">
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
                            <label class="input-group-text" for="inputGroupFile01">Immagine prodotto</label>
                            <input type="file" class="form-control" id=immagine" name="immagine">
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
require_once("includes/footer.php");
?>
</body>

</html>