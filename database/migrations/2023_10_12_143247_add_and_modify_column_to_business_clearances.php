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
        Schema::table('business_clearances', function (Blueprint $table) {
            $table->string('proof')->nullable()->change();
            $table->string('ctc_photo')->nullable()->after('expiry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_clearances', function (Blueprint $table) {
            $table->string('proof')->change();
            $table->dropColumn('ctc_photo');
        });
    }
};
