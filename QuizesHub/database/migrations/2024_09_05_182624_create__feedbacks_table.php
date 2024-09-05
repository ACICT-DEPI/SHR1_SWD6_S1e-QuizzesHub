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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->notNullable();
            $table->unsignedbiginteger('exam_id')->notNullable();
            $table->integer('rating');
            $table->text('comments');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('exam_id')->references('id')->on('exams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Feedback');
    }
};
