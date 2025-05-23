<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $imageSrc;

    public function __construct($id, $name, $description, $price, $imageSrc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->imageSrc = $imageSrc;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function imageSrc()
    {
        return $this->imageSrc;
    }
}
