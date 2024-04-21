<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
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
    public function test_home_endpoint(): void
    {
        $response = $this
            ->getJson(route('home'));

        $response->assertStatus(200);
    }

    /**
     * Recipe filtered search by text.
     */
    public function test_recipe_search_return_one_recipe_endpoint(): void
    {
        $tile = fake()->word();

        $body = fake()->paragraph();

        $recipeToSearch = Recipe::factory()->create([
            'title' => $tile,
            'body' => $body,
        ]);

        Recipe::factory(2)->create([
            'title' => 'Recipe not 1',
            'body' => 'Recipe not 1 body',
        ]);

        $response = $this
            ->getJson(route(
                'home',
                [
                    'filter' => $recipeToSearch->title,
                ],
            ));

        $recipes = $response->original['page']['props']['recipes'];

        $recipe = $recipes[0];

        $response->assertStatus(200);

        $this->assertEquals($tile, $recipe['title']);

        $this->assertCount(1, $recipes);
    }

    /**
     * Recipe filtered return an empty list.
     */
    public function test_recipe_search_results_return_an_empty_list(): void
    {
        $filter = Str::uuid();

        $body = fake()->paragraph();

        Recipe::factory()->create([
            'title' => fake()->word(),
            'body' => $body,
        ]);

        $response = $this
            ->getJson(route(
                'home',
                [
                    'filter' => $filter,
                ],
            ));

        $recipes = $response->original['page']['props']['recipes'];

        $response->assertStatus(200);

        $this->assertCount(0, $recipes);
    }
}
