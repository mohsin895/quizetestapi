<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currect_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id')->nullable();
            $table->integer('attribute_id')->nullable();
            $table->integer('answer')->nullable();
            $table->string('marks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currect_answers');
    }
};
