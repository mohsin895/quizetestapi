<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizeDetails>
 */
class QuizeDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quize_name' => fake()->firstName(),  
            'quize_time' => 30,
            'staff_id' => 1,
           
        ];
    }
}
