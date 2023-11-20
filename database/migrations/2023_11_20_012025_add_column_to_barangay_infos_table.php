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
        Schema::table('barangay_infos', function (Blueprint $table) {
            $table->boolean('family_profiling')->default(false)->after('vision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangay_infos', function (Blueprint $table) {
            $table->dropColumn('family_profiling');
        });
    }
};
