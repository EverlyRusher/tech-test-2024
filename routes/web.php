<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipes/filter', function (Request $request) {
    $data = $request->validate([
        'search_query' => 'required|string',
    ]);

    $recipes = Recipe::where('title', 'like', "%{$data['search_query']}%")
        ->orWhere('body', 'like', "%{$data['search_query']}%")
        ->get();

    return view('home', compact('recipes'))
        ->with('searchTerm', $data['search_query']);
})->name('recipe.filter');
