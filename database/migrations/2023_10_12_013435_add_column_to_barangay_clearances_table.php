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
        Schema::table('barangay_clearances', function (Blueprint $table) {
            $table->string('ctc_photo')->nullable()->after('date_issued');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangay_clearances', function (Blueprint $table) {
            $table->dropColumn('ctc_photo');
        });
    }
};
