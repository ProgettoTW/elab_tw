<?php
class Product{

  private $id;
  private $name;
  private $description;
  private $categoryId;
  private $price;

  public function __construct($name, $price, $description, $categoryId){
      $this->name = $name;
      $this->description = $description;
      $this->categoryId= $categoryId;
      $this->price = $price;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->id = $name;
  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice($price){
    $this->id = $price;
  }

  public function getDescription(){
    return $this->description;
  }

  public function setDescription($description){
    $this->id = $description;
  }

  public function getCategoryId(){
    return $this->categoryId;
  }

  public function setCategoryId($categoryId){
    $this->id = $categoryId;
  }


}
?>
