<?php

class Product
{

    private $id;
    private $name;
    private $description;
    private $customizable;
    private $price;

    public function __construct($name, $price, $description, $customizable)
    {
        $this->ProductName = $name;
        $this->Description = $description;
        $this->Customizable = $customizable;
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


}

?>
