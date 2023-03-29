<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => fake()->unique()->randomElement(['Drinks','Dessert','Chips','Biscuits','Meat','Milk']),
            'product_name' => fake()->unique()->randomElement(['Coke','Chicken','Piattos','Presto','Vitamilk']),
            'stocks' => fake()->numberBetween($min = 99, $max = 999),
            'price' => fake()->numberBetween($min = 99, $max = 9999),
        ];
    }
}
