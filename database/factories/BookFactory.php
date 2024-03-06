<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'editor_id' => Editor::all()->random()->id,
            'author_id' => Author::all()->random()->id,
            'name' => fake()->words(2, true),
            "cover" => fake()->imageUrl(640, 480, "book", true),
            'description' => fake()->text(1000),
            "published_at" => fake()->dateTimeBetween("-10 years"),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
