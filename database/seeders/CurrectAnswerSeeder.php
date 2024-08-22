<?php

namespace Database\Seeders;

use App\Models\CurrectAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CurrectAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dataCount = 100;

        // $this->command->info("Creating {$dataCount} answer.");

        // CurrectAnswer::factory()->count($dataCount)->create();

        // $this->command->info("{$dataCount} answer created.");

        DB::table('currect_answers')->insert([
            'question_id' => 1,
            'attribute_id' => 2,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 2,
            'attribute_id' => 5,
            'answer' => 1,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 3,
            'attribute_id' => 12,
            'answer' => 4,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 4,
            'attribute_id' => 13,
            'answer' => 1,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 5,
            'attribute_id' => 20,
            'answer' => 4,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 6,
            'attribute_id' => 22,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 7,
            'attribute_id' => 26,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 8,
            'attribute_id' => 31,
            'answer' => 3,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 9,
            'attribute_id' => 36,
            'answer' => 4,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 10,
            'attribute_id' => 38,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 11,
            'attribute_id' => 43,
            'answer' => 3,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 12,
            'attribute_id' => 48,
            'answer' => 4,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 13,
            'attribute_id' => 51,
            'answer' => 3,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 14,
            'attribute_id' => 54,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 15,
            'attribute_id' => 58,
            'answer' => 2,
            'marks' => 10,
        ]);
        DB::table('currect_answers')->insert([
            'question_id' => 16,
            'attribute_id' => 64,
            'answer' => 4,
            'marks' => 10,
        ]);

    }
}
