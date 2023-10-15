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
            $table->foreignId('student_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->bigInteger('trackable_id')->unsigned();
            $table->string('trackable_type');
            $table->tinyInteger('level');
            $table->timestamp('enrolled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
