<?php

class order_item
{

    private $ID;
    private $orderID;
    private $productID;
    private $quantity;
    private $productName;

    //Boh non so se è necessario il name intanto lo metto

    public function __construct($productID, $quantity, $orderID)
    {
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->orderID = $orderID;
    }


    public function getOrderID()
    {
        return $this->orderID;
    }


    public function setOrderID($orderID): void
    {
        $this->orderID = $orderID;
    }


    public function getProductID()
    {
        return $this->productID;
    }


    public function setProductID($productID): void
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


    public function getID()
    {
        return $this->ID;
    }


    public function setID($ID): void
    {
        $this->ID = $ID;
    }


}


?>