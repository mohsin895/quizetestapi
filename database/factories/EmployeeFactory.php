<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Employee::class;
    public function definition(): array
    {
        return [
            'fName' => fake()->firstName(),  
            'lName' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' =>  Hash::make('123456789'),
            'status' => 'active',
        ];
    }
}
