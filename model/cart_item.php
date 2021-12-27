<?php
class Cart_item{

  private $id;
  private $cartId;
  private $productId;
  private $quantity;
  private $productName;

  public function __construct($productId, $quantity, $cartId){
      $this->productId = $productId;
      $this->quantity = $quantity;
      $this->cartId = $cartId;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getProductId(){
    return $this->productId;
  }

  public function setProductId($productId){
    $this->productId = $productId;
  }

  public function getQuantity(){
    return $this->quantity;
  }

  public function setQuantity($quantity){
    $this->id = $quantity;
  }

  public function getCartId(){
    return $this->cartId;
  }

  public function setCartId($cartId){
    $this->id = $cartId;
  }

  public function getProductName(){
    return $this->productName;
  }

  public function setProductName($productName){
    $this->productName = $productName;
  }

}
?>
