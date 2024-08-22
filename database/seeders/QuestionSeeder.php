<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dataCount = 100;

        // $this->command->info("Creating {$dataCount} quize.");

        // Question::factory()->count($dataCount)->create();

        // $this->command->info("{$dataCount} quize created.");
        DB::table('questions')->insert([
            'quize_details_id' => 1,
            'question_name' => "Who Created Laravel?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 1,
            'question_name' => "What is the use of .env file in Laravel?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 1,
            'question_name' => "Command to start Laravel Application?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 1,
            'question_name' => "Command to install laravel project?",
            'question_marks' => 10,
        ]);
       
        
       
        DB::table('questions')->insert([
            'quize_details_id' => 2,
            'question_name' => "What is VueJS primarily used for?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 2,
            'question_name' => "Which directive is used in VueJS to bind an attribute to an expression?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 2,
            'question_name' => "In VueJS, which directive is used for two-way data binding on an input element?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 2,
            'question_name' => "What is the VueJS syntax for looping through items in an array?",
            'question_marks' => 10,
        ]);
      
        DB::table('questions')->insert([
            'quize_details_id' => 3,
            'question_name' => "What is PHP?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 3,
            'question_name' => " Who is the father of PHP?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 3,
            'question_name' => "What does PHP stand for?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 3,
            'question_name' => "Which of the following is the correct syntax to write a PHP code?",
            'question_marks' => 10,
        ]);
       
        DB::table('questions')->insert([
            'quize_details_id' => 4,
            'question_name' => "In which language MYSQL is written?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 4,
            'question_name' => "To see the list of options provided by MYSQL which of the following command is used?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 4,
            'question_name' => "What do you mean by HOST in MYSQL?",
            'question_marks' => 10,
        ]);
        DB::table('questions')->insert([
            'quize_details_id' => 4,
            'question_name' => "To know your MYSQL version and current date which of the following command you should use?",
            'question_marks' => 10,
        ]);
       
       
       
    }
}
