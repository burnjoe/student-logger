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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->dateTime('logged_in_at');
            $table->dateTime('logged_out_at')->nullable();
            $table->enum('note', ['Logged In', 'Logged Out', 'Missed Log Out']);
            $table->foreignId('post_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->softDeletes();
            // Include status: Attempt Failed, Attempt Success
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
