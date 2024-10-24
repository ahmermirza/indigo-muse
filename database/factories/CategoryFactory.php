<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => function (array $attributes) {
                return Str::slug($attributes['name']) . '-' . Str::random(5);
            },
            'description' => $this->faker->sentence,
            'parent_id' => Category::inRandomOrder()->first()->id ?? null,  // This will randomly assign an existing category as the parent or set null
        ];
    }
}
