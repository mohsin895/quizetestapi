<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber,
            'password' => Hash::make('123456789'),
            'avatar' => 'https://picsum.photos/200/300?random=' . $this->faker->randomNumber(),
            'address' => $this->faker->address,
            'status' => 1,
            'created_at' => Carbon::now(),
        ];
    }
}
