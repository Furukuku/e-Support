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
        Schema::table('family_heads', function (Blueprint $table) {
            // drop columns
            $table->dropColumn('water_source');
            $table->dropColumn('house');
            $table->dropColumn('toilet');
            $table->dropColumn('garden');
            $table->dropColumn('electricity');

            // add columns
            // water source
            $table->boolean('pipe_nawasa')->default(false)->after('booster_brand');
            $table->boolean('deep_well')->default(false)->after('pipe_nawasa');

            // type of house
            $table->boolean('nipa')->default(false)->after('deep_well');
            $table->boolean('concrete')->default(false)->after('nipa');
            $table->boolean('sem')->default(false)->after('concrete');
            $table->boolean('wood')->default(false)->after('sem');

            // toilet
            $table->boolean('owned_toilet')->default(false)->after('wood');
            $table->boolean('sharing_toilet')->default(false)->after('owned_toilet');

            // garden
            $table->boolean('poultry_livestock')->default(false)->after('sharing_toilet');
            $table->boolean('iodized_salt')->default(false)->after('poultry_livestock');

            // electricity
            $table->boolean('owned_electricity')->default(false)->after('iodized_salt');
            $table->boolean('sharing_electricity')->default(false)->after('owned_electricity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('family_heads', function (Blueprint $table) {
            $table->string('water_source')->after('booster_brand');
            $table->string('house')->after('water_source');
            $table->string('toilet')->after('house');
            $table->string('garden')->after('toilet');
            $table->string('electricity')->after('garden');

            // water source
            $table->dropColumn('pipe_nawasa');
            $table->dropColumn('deep_well');

            // type of house
            $table->dropColumn('nipa');
            $table->dropColumn('concrete');
            $table->dropColumn('sem');
            $table->dropColumn('wood');

            // toilet
            $table->dropColumn('owned_toilet');
            $table->dropColumn('sharing_toilet');

            // garden
            $table->dropColumn('poultry_livestock');
            $table->dropColumn('iodized_salt');

            // electricity
            $table->dropColumn('owned_electricity');
            $table->dropColumn('sharing_electricity');
        });
    }
};
