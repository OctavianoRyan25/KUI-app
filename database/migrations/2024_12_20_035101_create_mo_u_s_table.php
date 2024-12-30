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
        Schema::create('MoUs', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('document_number');
            $table->string('document_name');
            $table->string('length_of_contract');
            $table->string('type_of_contract');
            $table->foreignId('mitra_id')->constrained('mitras')->onDelete('cascade');
            $table->string('contract_value');
            $table->string('description')->nullable();
            $table->string('MoU_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mo_u_s');
    }
};
