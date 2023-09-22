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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('lname');
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->date('bday');
            $table->string('bplace');
            $table->string('educ_attainment');
            $table->date('first_dose')->nullable();
            $table->date('second_dose')->nullable();
            $table->string('vaccine_brand')->nullable();
            $table->date('booster')->nullable();
            $table->string('booster_brand')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
