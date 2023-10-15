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
            $table->foreignId('card_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamp('logged_in_at');
            $table->timestamp('logged_out_at')->nullable();
            $table->enum('status', ['IN', 'OUT', 'MISSED']);
            $table->foreignId('post_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->softDeletes();
            $table->timestamps();
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
