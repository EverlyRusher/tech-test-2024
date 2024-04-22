<?php

use App\Http\Controllers\RetrieveRecipes;
use Illuminate\Support\Facades\Route;

Route::get('/', RetrieveRecipes::class)->name('home');
