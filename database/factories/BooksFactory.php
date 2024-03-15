<?php

namespace Database\Factories;

use App\Models\Authors;
use App\Models\Editors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'editor_id' => Editors::all()->random()->id,
            'author_id' => Authors::all()->random()->id,
            'name' => fake()->words(2, true),
            "cover" => fake()->imageUrl(640, 480, "book", true),
            'description' => fake()->text(1000),
            "published_at" => fake()->dateTimeBetween("-10 years"),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
