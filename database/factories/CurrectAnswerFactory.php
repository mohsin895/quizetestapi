<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionAttributes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CurrectAnswer>
 */
class CurrectAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => Question::pluck('id')->random(),  
            'attribute_id' => QuestionAttributes::pluck('id')->random(),
            'answer' => QuestionAttributes::pluck('question_number')->random()
        ];
    }
}
