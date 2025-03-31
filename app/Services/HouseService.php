<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class HouseService
{
    public function getHouses(): Collection
    {
        $data = File::json(resource_path('sample-data/woningen.json'));
        $houses = collect($data['data']['houses']);

        return $houses->map(function ($house) {
            return [
                'url' => $house['housing_url'],
                'price' => $house['price'],
                'street' => $house['street'],
                'city' => $house['city'],
                'image' => $house['images'][0]['url'],
            ];
        });
    }
}
