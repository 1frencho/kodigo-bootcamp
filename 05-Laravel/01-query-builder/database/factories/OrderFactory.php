<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            'Laptop',
            'Smartphone',
            'Wireless Mouse',
            'Bluetooth Speaker',
            'Gaming Headset',
            'Keyboard',
            'Monitor',
            'Tablet',
            'USB Drive',
            'External Hard Drive',
        ];

        return [
            'product' => fake()->randomElement($products),
            'quantity' => fake()->numberBetween(1, 10),
            'total' => fake()->randomFloat(2, 1, 1000),
            'user_id' => fake()->numberBetween(1, 5),
        ];
    }
}
