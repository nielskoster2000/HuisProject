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

    public function index(Request $request)
    {
        return view('home');
    }

    public function filter(Request $request)
    {
        $search = strtolower($request->input('search'));
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');
        $page = $request->input('page');

        $houses = $this->houseService->getHouses();
        $filteredHouses = $houses->filter(function ($item) use ($search, $pmin, $pmax) {
            if ($search && ! (str_contains(strtolower($item['street']), $search) || str_contains(strtolower($item['city']), $search))) {
                return false;
            }

            if ($pmin && $item['price'] < $pmin) {
                return false;
            }
            if ($pmax && $item['price'] > $pmax) {
                return false;
            }

            return true;
        });

        $count = $filteredHouses->count();
        $pageCount = ceil($count / 9);
        $paginatedHouses = $filteredHouses->slice($page * 9, 9);
        
        return [
            'housesHTML' => view('components.listinggrid', ['houses' => $paginatedHouses])->render(),
            'paginationHTML' => view('components.pagination', ['pageCount' => $pageCount])->render(),
            'count' => $count,
        ];
    }
}
