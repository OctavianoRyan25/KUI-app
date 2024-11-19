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
        Schema::create('research_collaborations', function (Blueprint $table) {
            $table->id();
            $table->string('correspondence');
            $table->string('study_program');
            $table->string('name');
            $table->string('email');
            $table->string('list_authors');
            $table->string('phone');
            $table->string('university');
            $table->string('department');
            $table->string('faculty');
            $table->string('link_paper');
            $table->string('publish_date');
            $table->string('title');
            $table->string('fee_journal');
            $table->string('journal_output');
            $table->string('journal_level');
            $table->string('loa');
            $table->string('invoice');
            $table->string('paper');
            $table->boolean('is_PKS');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_collaborations');
    }
};
