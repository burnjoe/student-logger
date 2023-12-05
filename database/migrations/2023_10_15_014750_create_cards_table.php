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
        Schema::create('cards', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('rfid')->unique();
            $table->foreignId('student_id')
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string('profile_photo');
            $table->string('signature')->nullable();
            $table->enum('issuance_reason', ['First Issue', 'Renewal', 'Reissue for Lost ID']);
            $table->timestamp('expires_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
