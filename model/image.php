<?php

class Image
{

    private int $id;
    private int $productId;
    private string $url;
    private string $alt;

    public function __construct($productId, $url, $alt)
    {
        $this->productId = $productId;
        $this->url = $url;
        $this->alt = $alt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->id = $url;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }

    public function setAlt($alt)
    {
        $this->id = $alt;
    }

}
