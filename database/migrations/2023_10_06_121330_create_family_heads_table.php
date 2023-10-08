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
        Schema::create('family_heads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->string('fullname');
            $table->date('bday');
            $table->string('bplace');
            $table->string('civil_status');
            $table->string('educ_attainment');
            $table->string('zone');
            $table->string('religion');
            $table->string('occupation');
            $table->string('contact');
            $table->boolean('philhealth');
            $table->date('first_dose')->nullable();
            $table->date('second_dose')->nullable();
            $table->string('vaccine_brand')->nullable();
            $table->date('booster')->nullable();
            $table->string('booster_brand')->nullable();

            //Others
            $table->string('water_source');
            $table->string('house');
            $table->string('toilet');
            $table->string('garden');
            $table->string('electricity');
            $table->string('house_no');

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
        Schema::dropIfExists('family_heads');
    }
};
