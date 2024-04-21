<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RetrieveRecipes extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd('ss');

        // $request->validated();

        $recipes = $request->filter ? Recipe::search($request->filter)->get() : collect();

        // return view('home', compact('recipes'))
        //     ->with('searchTerm', $request->filter);

        //dd($recipes);

        return Inertia::render('Recipes/Index', [
            'recipes' => RecipeResource::collection($recipes),
        ])->with('searchTerm', '');
    }
}
