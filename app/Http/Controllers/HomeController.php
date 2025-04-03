<?php

namespace App\Http\Controllers;

use Exception;
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
        $search = $request->input('search');
        $pmin = $request->input('pmin');
        $pmax = $request->input('pmax');
        $page = $request->input('page', 0);

        try {
            $houses = $this->houseService->getHouses($search, $pmin, $pmax);
        } catch (Exception $e) {
            return abort(404, 'Failed to retrieve houses');
        }

        // Retrieves a paginated subset of houses based on the current page size.
        $paginatedHouses = $houses->slice($page * $this->pageSize, $this->pageSize);

        $listinggrid = view('components.listinggrid', ['houses' => $paginatedHouses])->render();
        return response()->json(new Filter($listinggrid, $houses->count()));
    }

    public function pagination(Request $request): string
    {
        $count = $request->input('count', 0);
        $pageCount = ceil($count / $this->pageSize);

        return view('components.pagination', ['pageCount' => $pageCount])->render();
    }
}
