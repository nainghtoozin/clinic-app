<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . rand(100, 999),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 5, 200),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(80),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => 'products/demo-' . rand(1, 5) . '.jpg',
        ];
    }
}
