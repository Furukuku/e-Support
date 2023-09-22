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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->string('gender');
            $table->string('p_civil_status');
            $table->integer('age');
            $table->date('p_bday');
            $table->string('mother_maiden_name');
            $table->string('mobile');
            $table->string('blood_type')->nullable();
            $table->string('religion');
            $table->string('p_education');
            $table->string('p_occupation');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('zone');
            $table->string('street');
            $table->string('philhealth_no')->nullable();
            $table->string('member_name')->nullable();
            $table->string('membership_type')->nullable();
            $table->string('category_type')->nullable();
            $table->string('expiry')->nullable();
            $table->date('ph_bday')->nullable();
            $table->string('ph_civil_status')->nullable();
            $table->string('ph_education')->nullable();
            $table->string('ph_occupation')->nullable();
            $table->string('weight');
            $table->string('temp');
            $table->string('bp');
            $table->string('height');
            $table->string('pulse_rate');
            $table->string('respiratory_rate');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
