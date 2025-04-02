<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Services\HouseService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private HouseService $houseService;

    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
    }

    public function index() : View
    {
        return view('home');
    }

    public function filter(Request $request) : JsonResponse
    {
        $search = strtolower($request->input('search'));
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');
        $page = $request->input('page');

        $houses = $this->houseService->getHouses();

        $filteredHouses = $houses->filter(function ($house) use ($search, $pmin, $pmax) {
            return $house->filter($search, $pmin, $pmax);
        });

        $count = $filteredHouses->count();
        $paginatedHouses = $filteredHouses->slice($page * 9, 9);
        $view = view('components.listinggrid', ['houses' => $paginatedHouses])->render();

        return response()->json(new Filter($view, $count));
    }

    public function pagination(Request $request) : string
    {
        $count = $request->input('count');
        $pageCount = ceil($count / 9);

        return view('components.pagination', ['pageCount' => $pageCount])->render();
    }
}
