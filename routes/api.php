<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipes/filter', function (Request $request) {
    $data = $request->validate([
        'text' => 'required|string',
    ]);

    $recipes = Recipe::where('title', 'like', "%{$data['text']}%")
        ->orWhere('body', 'like', "%{$data['text']}%")
        ->get();

    return $recipes;
})->name('recipe.filter');
