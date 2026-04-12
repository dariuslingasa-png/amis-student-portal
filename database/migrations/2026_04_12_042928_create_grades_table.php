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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('grade_level'); // Grade 6, Grade 7, etc.
            $table->string('subject_code');
            $table->string('subject_name');
            $table->decimal('q1_grade', 5, 2)->nullable();
            $table->decimal('q2_grade', 5, 2)->nullable();
            $table->decimal('q3_grade', 5, 2)->nullable();
            $table->decimal('q4_grade', 5, 2)->nullable();
            $table->decimal('final_grade', 5, 2)->nullable();
            $table->string('remarks')->nullable(); // PASSED or FAILED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
