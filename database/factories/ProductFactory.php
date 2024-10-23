<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Setting random sale values
        $onSale = $this->faker->boolean;
        $salePrice = $onSale ? $this->faker->randomFloat(2, 5, 100) : null;
        $saleStart = $onSale ? $this->faker->dateTimeBetween('-1 month', 'now') : null;
        $saleEnd = $onSale ? $this->faker->dateTimeBetween('now', '+1 month') : null;

        return [
            'name' => $this->faker->unique()->word,  // Ensure product name is unique
            'slug' => function (array $attributes) {
                return Str::slug($attributes['name']) . '-' . Str::random(5);  // Generate unique slug
            },
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'on_sale' => $onSale,
            'sale_price' => $salePrice,
            'sale_start' => $saleStart,
            'sale_end' => $saleEnd,
            'stock' => $this->faker->numberBetween(0, 100),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),  // Random or new category
        ];
    }
}
