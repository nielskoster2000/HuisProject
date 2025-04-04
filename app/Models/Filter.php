<?php

namespace App\Models;

class Filter
{
    public $listinggrid;
    public $houseCount;

    public function __construct(string $listinggrid, int $houseCount)
    {
        $this->listinggrid = $listinggrid;
        $this->houseCount = $houseCount;
    }
}
