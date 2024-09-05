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
        Schema::create('ExamAttempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->notNullable();
            $table->unsignedbiginteger('exam_id')->notNullable();
            $table->integer('attempt_numper')->notNullable();
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->integer('score');
            $table->foreign('user_id')->references('id')->on('Users');
            // $table->foreign('exam_id')->references('id')->on('Exams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExamAttempt');
    }
};
