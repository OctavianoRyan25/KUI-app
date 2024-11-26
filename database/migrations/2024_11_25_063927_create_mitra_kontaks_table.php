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
        Schema::create('mitra_kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('mitra_id')->constrained(
                table: 'mitras',
                indexName: 'mitra_kontaks_mitra_id',
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_kontaks');
    }
};
