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
        Schema::create('AnswerAttempt', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->notNullable();
            $table->unsignedbiginteger('question_id')->notNullable();
            $table->unsignedbiginteger('selected_answer_id')->notNullable();
            $table->integer('attempt_number')->notNullable();
            // $table->foreign('user_id')->references('id')->on('Users');
            // $table->foreign('question_id')->references('id')->on('Questions');
            // $table->foreign('selected_answer_id')->references('id')->on('Answers');
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
