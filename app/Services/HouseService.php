<?php

namespace App\Services;

use App\Models\House;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class HouseService
{
    public function getHouses(): Collection
    {
        $data = File::json(resource_path('sample-data/woningen.json'));
        $houses = collect($data['data']['houses']);

        return $houses->map(function ($house) {
            return new House(
                $house['street'],
                $house['city'],
                $house['price'],
                $house['images'][0]['url']
            );
        });
    }
}
