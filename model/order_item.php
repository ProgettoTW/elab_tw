<?php

class Order_Item
{

    private int $ID;
    private int $orderID;
    private int $productID;
    private int $quantity;
    private string $productName;

    //Boh non so se è necessario il name intanto lo metto

    public function __construct($productID, $quantity, $orderID)
    {
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->orderID = $orderID;
    }


    public function getOrderId()
    {
        return $this->orderID;
    }


    public function setOrderId($orderID): void
    {
        $this->orderID = $orderID;
    }


    public function getProductId()
    {
        return $this->productID;
    }


    public function setProductId($productID): void
    {
        $this->productID = $productID;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }


    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }


    public function getProductName()
    {
        return $this->productName;
    }


    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }


    public function getId()
    {
        return $this->ID;
    }


    public function setId($ID): void
    {
        $this->ID = $ID;
    }


}


?>