<?php

class Category
{

    private int $id;
    private string $name;
    private string $descr;

    public function __construct($name, $descr)
    {
        $this->name = $name;
        $this->descr = $descr;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->descr;
    }

    public function setDescription($descr): void
    {
        $this->descr = $descr;
    }

}

