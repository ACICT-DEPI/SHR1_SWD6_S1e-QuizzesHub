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
        Schema::create('new_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('file_path');
            $table->foreignId('university_id');
            $table->foreignId('faculty_id');
            $table->foreignId('major_id');
            $table->foreignId('course_id');
            $table->enum('type', ['final', 'midterm', 'oral','sheet']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_exams');
    }
};
