<?php

namespace Tests\Browser;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RecipeTest extends DuskTestCase
{
    use DatabaseTruncation;

    /**
     * A Dusk test example.
     */
    public function test_search_recipe(): void
    {
        $this->browse(function (Browser $browser) {
            $recipe_to_search = Recipe::factory()->create([
                'title' => 'Recipe 1',
                'body' => 'Recipe 1 body',
            ]);

            Recipe::factory(2)->create([
                'title' => 'Recipe not 1',
                'body' => 'Recipe not 1 body',
            ]);

            $browser
                ->visit('/')
                ->type('search_query', $recipe_to_search->title)
                ->press('Search')
                ->assertSee('Search Results for: Recipe 1')
                ->assertSee($recipe_to_search->title)
                ->assertSee($recipe_to_search->body)
            ;
        });
    }
}
