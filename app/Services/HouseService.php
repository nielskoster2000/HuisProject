<?php

namespace App\Services;

use App\Models\House;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class HouseService
{
    public function getHouses(?string $search = null, ?int $pmin = null, ?int $pmax = null): Collection
    {
        $data = File::json(resource_path('sample-data/woningen.json'));
        $houses = collect($data['data']['houses']);

        $mappedHouses = $houses->map(function ($house) {
            return new House(
                $house['street'],
                $house['city'],
                $house['price'],
                $house['images'][0]['url'] ?? null
            );
        });

        return $mappedHouses->filter(function ($house) use ($search, $pmin, $pmax) {
            return $house->filter($search, $pmin, $pmax);
        });
    }
}
