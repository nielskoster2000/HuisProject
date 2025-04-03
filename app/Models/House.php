<?php

namespace App\Models;

class House
{
    public $street;
    public $city;
    public $price;
    public $image = null;

    public function __construct(string $street, string $city, int $price, ?string $image = null)
    {
        $this->street = $street;
        $this->city = $city;
        $this->price = $price;
        $this->image = $image;
    }

    public function filter(?string $search = null, ?int $pmin = null, ?int $pmax = null): bool
    {
        if ($search && !$this->in_search($search)) { 
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

    private function in_search(string $search) 
    {
        $search = strtolower($search);
        $street = strtolower($this->street);
        $city = strtolower($this->city);

        return str_contains($street, $search) || str_contains($city, $search);
    }
}
