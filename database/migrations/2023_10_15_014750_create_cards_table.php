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
            $table->text('rfid');
            $table->foreignId('student_id')
                ->references('id')
                ->on('students')
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->text('profile_photo');
            $table->enum('issuance_reason', ['First Issue', 'Renewal', 'Reissue for Lost ID']);
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->foreignId('contact_person_id')
                ->references('id')
                ->on('family_members')
                ->constrained()
                ->restrictOnDelete();
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
