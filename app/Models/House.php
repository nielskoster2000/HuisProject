<?php

namespace App\Models;

class House
{
    public $street;

    public $city;

    public $price;

    public $image;

    public function __construct($street, $city, $price, $image)
    {
        $this->street = $street;
        $this->city = $city;
        $this->price = $price;
        $this->image = $image;
    }
}
