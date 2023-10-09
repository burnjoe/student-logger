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
        Schema::create('family_member_student', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->unsigned();
            $table->unsignedBigInteger('family_member_id')->unsigned();

            $table->unique(['student_id', 'family_member_id']);

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->foreign('family_member_id')
                ->references('id')
                ->on('family_members')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_member_student');
    }
};
