<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $houses = File::json(storage_path('json/api-free-p1.json'))['data']['houses'];
    return view('home', [
        'title' => 'Huurwoningen in Amsterdam',
        'houses' => $houses,
        'houseCount' => count($houses) . ' resultaten',
    ]);
});
