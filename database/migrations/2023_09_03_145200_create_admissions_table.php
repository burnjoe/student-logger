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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strand_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->string('grade_level');
            $table->foreignId('program_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->string('year_level');
            $table->timestamp('enrolled_at')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
