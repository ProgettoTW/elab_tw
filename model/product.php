<?php

class Product
{

    private $id;
    private $ProductName;
    private $Description;
    private $Customizable;
    private $Quantity;
    private $UnitPrice;

    public function __construct($name, $price, $description, $customizable, $quantity)
    {
        $this->ProductName = $name;
        $this->Description = $description;
        $this->Customizable = $customizable;
        $this->Quantity = $quantity;
        $this->UnitPrice = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->ProductName;
    }

    public function setName($name)
    {
        $this->ProductName = $name;
    }

    public function getPrice()
    {
        return $this->UnitPrice;
    }

    public function setPrice($price)
    {
        $this->UnitPrice = $price;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($description)
    {
        $this->Description = $description;
    }

    public function getCustomizable()
    {
        return $this->Customizable;
    }

    public function setCustomizable($customizable)
    {
        $this->Customizable = $customizable;
    }

    public function getQuantity()
    {
        return $this->Quantity;
    }


    public function setQuantity($Quantity): void
    {
        $this->Quantity = $Quantity;
    }


}
