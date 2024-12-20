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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->string('kriteria_mitra');
            $table->string('tingkat');
            $table->string('regional')->nullable();
            $table->string('kota')->nullable();
            $table->string('negara')->nullable();
            $table->string('jenis_mitra')->nullable();
            $table->string('logo_mitra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
