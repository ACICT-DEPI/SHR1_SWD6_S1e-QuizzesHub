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
        Schema::table('answer_question_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('selected_answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->foreign('exam_user_id')->references('id')->on('exam_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer_attempts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['question_id']);
            $table->dropForeign(['selected_answer_id']);
        });
    }
};
