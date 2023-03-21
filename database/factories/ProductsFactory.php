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
            'category_name' => fake()->randomElement(['Drinks','Dessert','Chips','Biscuits','Meat','Milk']),
            'product_name' => fake()->randomElement(['Coke','Chicken','Piattos','Presto','VitaMilk']),
            'price' => fake()->numberBetween($min = 99, $max = 9999),
        ];
    }
}
