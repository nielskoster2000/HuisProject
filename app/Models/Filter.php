<?php

namespace App\Models;

class Filter
{
    public $houses;

    public $houseCount;

    public function __construct(string $houses, int $houseCount)
    {
        $this->houses = $houses;
        $this->houseCount = $houseCount;
    }
}
