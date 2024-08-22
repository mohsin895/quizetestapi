<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QuizeDetails;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_name' => fake()->sentence(),  // Changed to generate a random sentence
            'question_marks' => 10,
            'quize_details_id' => QuizeDetails::pluck('id')->random(),
        ];
    }
}
