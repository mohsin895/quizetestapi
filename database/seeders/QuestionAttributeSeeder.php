<?php

namespace Database\Seeders;

use App\Models\QuestionAttributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class QuestionAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dataCount = 500;

        // $this->command->info("Creating {$dataCount} quize.");

        // QuestionAttributes::factory()->count($dataCount)->create();

        // $this->command->info("{$dataCount} quize created.");

        DB::table('question_attributes')->insert([
            'question_id' => 1,
            'question_number' => 1,
            'question_option' => "Margon Stan",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 1,
            'question_number' => 2,
            'question_option' => "Taylor Otwell",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 1,
            'question_number' => 3,
            'question_option' => "Samsy Twig",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 1,
            'question_number' => 4,
            'question_option' => "None of these",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 2,
            'question_number' => 1,
            'question_option' => "Setting Up local Environment variable",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 2,
            'question_number' => 2,
            'question_option' => "Optimization",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 2,
            'question_number' => 3,
            'question_option' => "Hosting",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 2,
            'question_number' => 4,
            'question_option' => "None of these",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 3,
            'question_number' => 1,
            'question_option' => "php artisan new",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 3,
            'question_number' => 2,
            'question_option' => "php artisan",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 3,
            'question_number' => 3,
            'question_option' => "php artisan start",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 3,
            'question_number' => 4,
            'question_option' => "php artisan serve",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 4,
            'question_number' => 1,
            'question_option' => "composer create-project laravel/laravel myproject",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 4,
            'question_number' => 2,
            'question_option' => "composer new-project laravel/laravel myproject",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 4,
            'question_number' => 3,
            'question_option' => "composer create-project new laravel/laravel myproject",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 4,
            'question_number' => 4,
            'question_option' => "None of these",
        ]);




        DB::table('question_attributes')->insert([
            'question_id' => 5,
            'question_number' => 1,
            'question_option' => " Backend development",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 5,
            'question_number' => 2,
            'question_option' => "Mobile app development",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 5,
            'question_number' => 3,
            'question_option' => "Game development",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 5,
            'question_number' => 4,
            'question_option' => "Frontend development",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 6,
            'question_number' => 1,
            'question_option' => "v-for",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 6,
            'question_number' => 2,
            'question_option' => "v-bind",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 6,
            'question_number' => 3,
            'question_option' => "v-model",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 6,
            'question_number' => 4,
            'question_option' => "v-if",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 7,
            'question_number' => 1,
            'question_option' => " v-repeat",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 7,
            'question_number' => 2,
            'question_option' => "v-for",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 7,
            'question_number' => 3,
            'question_option' => "v-loop",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 7,
            'question_number' => 4,
            'question_option' => "v-iterate",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 8,
            'question_number' => 1,
            'question_option' => "v-bind",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 8,
            'question_number' => 2,
            'question_option' => " v-input",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 8,
            'question_number' => 3,
            'question_option' => "v-model",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 8,
            'question_number' => 4,
            'question_option' => "v-data",
        ]);



        DB::table('question_attributes')->insert([
            'question_id' => 9,
            'question_number' => 1,
            'question_option' => " PHP is an open-source programming language",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 9,
            'question_number' => 2,
            'question_option' => " PHP is used to develop dynamic and interactive websites",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 9,
            'question_number' => 3,
            'question_option' => "PHP is a server-side scripting language",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 9,
            'question_number' => 4,
            'question_option' => "All of the mentioned",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 10,
            'question_number' => 1,
            'question_option' => "Drek Kolkevi",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 10,
            'question_number' => 2,
            'question_option' => " Rasmus Lerdorf",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 10,
            'question_number' => 3,
            'question_option' => "Willam Makepiece",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 10,
            'question_number' => 4,
            'question_option' => "List Barely",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 11,
            'question_number' => 1,
            'question_option' => "PHP stands for Preprocessor Home Page",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 11,
            'question_number' => 2,
            'question_option' => " PHP stands for Pretext Hypertext Processor",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 11,
            'question_number' => 3,
            'question_option' => "PHP stands for Hypertext Preprocessor",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 11,
            'question_number' => 4,
            'question_option' => "PHP stands for Personal Hyper Processor",
        ]);

        DB::table('question_attributes')->insert([
            'question_id' => 12,
            'question_number' => 1,
            'question_option' => "<?php ?>",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 12,
            'question_number' => 2,
            'question_option' => " < php >",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 12,
            'question_number' => 3,
            'question_option' => "< ? php ?>",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 12,
            'question_number' => 4,
            'question_option' => "<? ?>",
        ]);


        DB::table('question_attributes')->insert([
            'question_id' => 13,
            'question_number' => 1,
            'question_option' => "PYTHON",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 13,
            'question_number' => 2,
            'question_option' => " C/C+",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 13,
            'question_number' => 3,
            'question_option' => "JAVA",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 13,
            'question_number' => 4,
            'question_option' => "COBOL",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 14,
            'question_number' => 1,
            'question_option' => "HELP",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 14,
            'question_number' => 2,
            'question_option' => "–HELP",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 14,
            'question_number' => 3,
            'question_option' => "-- HELP",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 14,
            'question_number' => 4,
            'question_option' => "ELP-",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 15,
            'question_number' => 1,
            'question_option' => "HOST is the user name.",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 15,
            'question_number' => 2,
            'question_option' => "HOST is the representation of where the MYSQL server is running.",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 15,
            'question_number' => 3,
            'question_option' => "HOST is the administration’s machine name.",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 15,
            'question_number' => 4,
            'question_option' => "TRUE",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 16,
            'question_number' => 1,
            'question_option' => "VERSION, CURRENT_DATE();",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 16,
            'question_number' => 2,
            'question_option' => "SELECT VERSION, CURRENTDATE();",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 16,
            'question_number' => 3,
            'question_option' => "SELECT VERSION(), CURRENT_DATE;",
        ]);
        DB::table('question_attributes')->insert([
            'question_id' => 16,
            'question_number' => 4,
            'question_option' => "SELECT VERSON(),CURRENT_DATE();",
        ]);
    }
}
