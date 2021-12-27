 <?php
	
  require_once("includes/header.php");
  require_once("model/product.php");
  require_once("model/cart.php");
  require_once("model/category.php");
  require_once("model/cart_item.php");





  $products = new ProductDB();
  $categories = new CategoryDB();

 ?>
<h1>HELLO WORLD!</h1>
