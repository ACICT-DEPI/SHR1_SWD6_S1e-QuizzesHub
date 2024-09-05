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
        Schema::create('Major', function (Blueprint $table) {
            $table->id();
            $table->varchar('name')->notNullable();
            $table->unsignedbiginteger('faculty_id')->notNullable();
            // $table->foreign('faculty_id')->references('id')->on('Faculties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Major');
    }
};
