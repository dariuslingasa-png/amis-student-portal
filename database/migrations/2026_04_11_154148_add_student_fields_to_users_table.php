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
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id')->nullable()->after('id');
            $table->string('student_type')->default('NEW STUDENT')->after('email'); // NEW STUDENT, OLD STUDENT, TRANSFEREE
            $table->string('enrollment_status')->default('PENDING')->after('student_type'); // PENDING, APPROVED, REJECTED
            $table->boolean('has_payment')->default(false)->after('enrollment_status');
            $table->string('grade_level')->nullable()->after('has_payment');
            $table->string('contact_number')->nullable()->after('grade_level');
            $table->text('address')->nullable()->after('contact_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'student_id',
                'student_type',
                'enrollment_status',
                'has_payment',
                'grade_level',
                'contact_number',
                'address'
            ]);
        });
    }
};
