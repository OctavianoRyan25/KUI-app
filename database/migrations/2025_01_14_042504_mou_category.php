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
        Schema::create('mou_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mou_id')->constrained('mous')->onDelete('cascade');
            $table->foreignId('category_of_mou_id')->constrained('category_of_mous')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou_category');
    }
};
