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

    private int $pageSize = 9;

    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
    }

    public function index(): View
    {
        return view('home');
    }

    public function filter(Request $request): JsonResponse
    {
        $search = strtolower($request->input('search'));
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');
        $page = $request->input('page');

        $houses = $this->houseService->getHouses($search, $pmin, $pmax);

        // Retrieves a paginated subset of houses based on the current page size.
        $paginatedHouses = $houses->slice($page * $this->pageSize, $this->pageSize);

        $view = view('components.listinggrid', ['houses' => $paginatedHouses])->render();
        $filter = new Filter($view, $houses->count());

        return response()->json($filter);
    }

    public function pagination(Request $request): string
    {
        $count = $request->input('count');
        $pageCount = ceil($count / $this->pageSize);

        return view('components.pagination', ['pageCount' => $pageCount])->render();
    }
}
