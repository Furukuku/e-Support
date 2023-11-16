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
            $table->string('decline_msg')->nullable()->after('is_approved');
            $table->string('disable_msg')->nullable()->after('is_active');
            $table->string('profile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('decline_msg');
            $table->dropColumn('disable_msg');
            $table->string('profile')->change();
        });
    }
};
