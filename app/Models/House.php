<?php

namespace App\Models;

class House
{
    public $street;

    public $city;

    public $price;

    public $image = null;

    public function __construct($street, $city, $price, $image = null)
    {
        $this->street = $street;
        $this->city = $city;
        $this->price = $price;
        $this->image = $image;
    }

    public function filter($search = null, $pmin = null, $pmax = null): bool
    {
        if ($search && ! (str_contains(strtolower($this->street), $search) || str_contains(strtolower($this->city), $search))) {
            return false;
        }

        if ($pmin && $this->price < $pmin) {
            return false;
        }
        if ($pmax && $this->price > $pmax) {
            return false;
        }

        return true;
    }
}
