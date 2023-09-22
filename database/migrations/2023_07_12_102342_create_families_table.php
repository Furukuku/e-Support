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
        Schema::create('families', function (Blueprint $table) {
            $table->id();

            // Family Head
            $table->string('head_lname');
            $table->string('head_fname');
            $table->string('head_mname')->nullable();
            $table->string('head_sname')->nullable();
            $table->date('head_bday');
            $table->string('head_bplace');
            $table->string('head_civil_status');
            $table->string('head_educ_attainment');
            $table->string('head_zone');
            $table->string('head_religion');
            $table->string('head_occupation');
            $table->string('head_contact');
            $table->string('head_philhealth');
            $table->date('head_first_dose')->nullable();
            $table->date('head_second_dose')->nullable();
            $table->string('head_vaccine_brand')->nullable();
            $table->date('head_booster')->nullable();
            $table->string('head_booster_brand')->nullable();

            // Wife
            $table->string('wife_lname');
            $table->string('wife_fname');
            $table->string('wife_mname')->nullable();
            $table->string('wife_sname')->nullable();
            $table->date('wife_bday');
            $table->string('wife_bplace');
            $table->string('wife_civil_status');
            $table->string('wife_educ_attainment');
            $table->string('wife_zone');
            $table->string('wife_religion');
            $table->string('wife_occupation');
            $table->string('wife_contact');
            $table->string('wife_philhealth');
            $table->date('wife_first_dose')->nullable();
            $table->date('wife_second_dose')->nullable();
            $table->string('wife_vaccine_brand')->nullable();
            $table->date('wife_booster')->nullable();
            $table->string('wife_booster_brand')->nullable();

            // Additional Info
            $table->integer('total_family_member');
            $table->string('water_source');
            $table->string('house');
            $table->string('toilet');
            $table->string('garden');
            $table->string('electricity');

            // Beneficiaries
            $table->integer('pwd')->nullable();
            $table->integer('solo_parent')->nullable();
            $table->integer('senior_citizen')->nullable();
            $table->integer('pregnant')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
