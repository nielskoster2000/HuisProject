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
        return view('home');
    }

    public function filter(Request $request)
    {
        $search = strtolower($request->input('search'));
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');
        $page = $request->input('page');

        $houses = $this->houseService->getHouses();

        $filteredHouses = $houses->filter(function ($house) use ($search, $pmin, $pmax) {
            if ($search && ! (str_contains(strtolower($house->street), $search) || str_contains(strtolower($house->city), $search))) {
                return false;
            }

            if ($pmin && $house->price < $pmin) {
                return false;
            }
            if ($pmax && $house->price > $pmax) {
                return false;
            }

            return true;
        });

        $count = $filteredHouses->count();
        $paginatedHouses = $filteredHouses->slice($page * 9, 9);

        return [
            'housesHTML' => view('components.listinggrid', ['houses' => $paginatedHouses])->render(),
            'count' => $count,
        ];
    }

    public function pagination(Request $request)
    {
        $count = $request->input('count');
        $pageCount = ceil($count / 9);

        return view('components.pagination', ['pageCount' => $pageCount])->render();
    }
}
