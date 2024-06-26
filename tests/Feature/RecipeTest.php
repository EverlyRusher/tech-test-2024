<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Recipe model migration factory test.
     */
    public function test_recipe_model_migration_factory(): void
    {
        $recipe = Recipe::factory()->create();

        $this->assertNotEmpty($recipe->id);
        $this->assertNotEmpty($recipe->title);
        $this->assertNotEmpty($recipe->body);

        $this->assertDatabaseHas('recipes', $recipe->toArray());
    }

    /**
     * Recipe filtered search by text.
     */
    public function test_recipe_search_endpoint(): void
    {
        $recipe_to_search = Recipe::factory()->create([
            'title' => 'Recipe 1',
            'body' => 'Recipe 1 body',
        ]);

        Recipe::factory(2)->create([
            'title' => 'Recipe not 1',
            'body' => 'Recipe not 1 body',
        ]);

        $this
            ->getJson(route(
                'recipe.filter',
                ['search_query' => $recipe_to_search->title],
            ))
            ->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee($recipe_to_search->body)
            ->assertSee($recipe_to_search->title)
            ->assertSee('Search Results for: Recipe 1')
            ->assertDontSee('Recipe not 1');
    }
}
