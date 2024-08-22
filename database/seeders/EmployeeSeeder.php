<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataCount = 10;

        $this->command->info("Creating {$dataCount} students.");

        Employee::factory()->count($dataCount)->create();

        $this->command->info("{$dataCount} students created.");
    }
}
