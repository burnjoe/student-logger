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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('student_no');
            $table->text('last_name');
            $table->text('first_name');
            $table->text('middle_name')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Divorced', 'Widowed']);
            $table->string('nationality');
            $table->date('birthdate');
            $table->text('birthplace');
            $table->text('address');
            $table->text('phone');
            $table->text('email');
            $table->enum('account_type', ['Cabuyeño', 'Non-Cabuyeño']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
