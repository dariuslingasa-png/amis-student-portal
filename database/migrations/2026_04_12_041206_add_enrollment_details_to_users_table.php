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
            $table->boolean('is_enrolled')->default(false)->after('enrollment_status');
            $table->boolean('has_subjects')->default(false)->after('is_enrolled');
            $table->boolean('is_dropout')->default(false)->after('has_subjects');
            $table->text('enrolled_subjects')->nullable()->after('is_dropout');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_enrolled', 'has_subjects', 'is_dropout', 'enrolled_subjects']);
        });
    }
};
