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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('name');
            $table->string('division')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('study_program')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('faculty')->nullable();
            $table->string('information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
