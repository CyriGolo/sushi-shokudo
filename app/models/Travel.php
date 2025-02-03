<?php

namespace App\models;

class Travel
{
    private $id;
    private $name;
    private $description;
    private $image;
    private $price;
    private $id_category;
    private $name_category;

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

    public function getImage()
    {
        return $this->image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function getCategory()
    {
        return $this->name_category;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setIdCategory($id_category)
    {
        $this->id_category = $id_category;
    }

    public function setCategory($name_category)
    {
        $this->name_category = $name_category;
    }
}