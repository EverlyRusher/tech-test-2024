<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class RetrieveRecipes extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(HttpRequest $request)
    {
        $filter = $request->filter;

        $recipes = $filter
            ? Recipe::search($filter)->get()
            : collect();

        return Inertia::render('Recipes/Index', [
            'recipes' => $recipes->isNotEmpty()
                ? RecipeResource::collection($recipes)
                : $recipes,
            'filter' => $filter,
        ]);
    }
}
