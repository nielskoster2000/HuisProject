<?php

namespace App\Http\Controllers;

use App\Services\HouseService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private HouseService $houseService;

    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
    }

    public function index()
    {
        return view('home', ['houseCount' => $this->houseService->getHouses()->count()]);
    }

    public function houses(Request $request)
    {
        $search = strtolower($request->input('search'));
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');

        $houses = $this->houseService->getHouses();
        $filteredHouses = $houses->filter(function ($item) use ($search, $pmin, $pmax) {
            if ($search && ! (str_contains(strtolower($item['street']), $search) || str_contains(strtolower($item['city']), $search))) {
                return false;
            }

            if ($pmin && $item['price'] < $pmin) { return false; }
            if ($pmax && $item['price'] > $pmax) { return false; }

            return true;
        });

        return view('components.listinggrid', ['houses' => $filteredHouses]);
    }
}
