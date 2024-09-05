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
        Schema::create('answer_attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->notNullable();
            $table->unsignedbiginteger('question_id')->notNullable();
            $table->unsignedbiginteger('selected_answer_id')->notNullable();
            $table->integer('attempt_number')->notNullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('question_id')->references('id')->on('questions');
            // $table->foreign('selected_answer_id')->references('id')->on('answers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('AnswerAttempt');
    }
};
