<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('filter', [HomeController::class, 'filter']);
Route::get('pagination', [HomeController::class, 'pagination']);
