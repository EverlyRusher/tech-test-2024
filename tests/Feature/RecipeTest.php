<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
