<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class StaffSeeder extends Seeder
{
    public function run()
    {
        // $dataCount = 1;

        // $this->command->info("Creating {$dataCount} staffs.");

        // Staff::factory()->count($dataCount)->create();

        // $this->command->info("{$dataCount} staffs created.");

        DB::table('staff')->insert([
            'name' => 'Mohsin sikder',
            'email' => 'admin@gmail.com',
            'phone' => '01715486265',
            'password' => Hash::make('123456789'),
            'avatar' => 'NULL',
            'address' => "Dhaka",
            'status' => 1,
            'created_at' => Carbon::now(),
           
        ]);
    }
}
