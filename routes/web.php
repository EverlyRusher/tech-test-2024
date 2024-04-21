<?php

use App\Http\Controllers\RetrieveRecipes;
use Illuminate\Support\Facades\Route;

// Route::get('/', static function () {
//     return view('home');
// });

Route::get('/', RetrieveRecipes::class)->name('home');
