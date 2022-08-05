<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween($min = 500, $max = 5000),
            'quantity' => $this->faker->randomDigit(),
            'avatar' => $this->faker->imageUrl(),
            'promotion' => rand(1,5),
            'describe' => $this->faker->text(64),
            'category_id' => rand(0, 4),
            'size' => rand(1, 3),
            
        ];
    }
}
