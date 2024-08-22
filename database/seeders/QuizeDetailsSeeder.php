<?php

namespace Database\Seeders;

use App\Models\QuizeDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class QuizeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dataCount = 10;

        // $this->command->info("Creating {$dataCount} quize.");

        // QuizeDetails::factory()->count($dataCount)->create();

        // $this->command->info("{$dataCount} quize created.");

        DB::table('quize_details')->insert([
            'staff_id' => 1,
            'quize_name' => "Laravel",
            
        ]);
        DB::table('quize_details')->insert([
            'staff_id' => 1,
            'quize_name' => "Vue js",
            
        ]);
        DB::table('quize_details')->insert([
            'staff_id' => 1,
            'quize_name' => "Php",
            
        ]);
        DB::table('quize_details')->insert([
            'staff_id' => 1,
            'quize_name' => "MySQL",
            
        ]);

    }
}
