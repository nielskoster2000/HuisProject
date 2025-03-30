<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $houses = File::json(storage_path('json/api-free-p1.json'))['data']['houses'];

        return view('home', [
            'title' => 'Huurwoningen in Amsterdam',
            'houses' => $houses,
            'houseCount' => count($houses).' resultaten',
        ]);
    }
}
