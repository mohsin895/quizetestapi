<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        
 $this->call(StaffSeeder::class);
         
  $this->call(EmployeeSeeder::class);
  $this->call(QuizeDetailsSeeder::class);
  $this->call(QuestionSeeder::class);
  $this->call(QuestionAttributeSeeder::class);
  $this->call(CurrectAnswerSeeder::class);

     
    }
}
