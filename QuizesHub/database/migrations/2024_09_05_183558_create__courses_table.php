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
        Schema::create('Course', function (Blueprint $table) {
            $table->id();
            $table->varchar('name')->notNullable();
            $table->varchar('code')->notNullable();
            $table->unsignedbiginteger('major_id')->notNullable();
            $table->foreign('major_id')->references('id')->on('Majors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Course');
    }
};
