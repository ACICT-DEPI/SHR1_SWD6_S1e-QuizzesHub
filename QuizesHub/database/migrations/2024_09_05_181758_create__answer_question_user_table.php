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
        Schema::create('answer_question_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->notNullable();
            $table->unsignedbiginteger('question_id')->notNullable();
            $table->unsignedbiginteger('selected_answer_id')->notNullable();
            $table->unsignedBigInteger('exam_user_id')->notNullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_attempts');
    }
};
