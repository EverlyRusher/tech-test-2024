<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->validate([
            'search_query' => 'required|string',
        ]);
    
        $recipes = Recipe::search($data['search_query'])->get();
    
        return response()->json($recipes);
    }
}