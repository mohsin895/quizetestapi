<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $dataCount = 1;

        $this->command->info("Creating {$dataCount} staffs.");

        Staff::factory()->count($dataCount)->create();

        $this->command->info("{$dataCount} staffs created.");
    }
}
