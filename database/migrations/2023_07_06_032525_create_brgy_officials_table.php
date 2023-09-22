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
        Schema::create('brgy_officials', function (Blueprint $table) {
            $table->id();
            $table->string('display_img');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('sname')->nullable();
            $table->string('zone');
            $table->string('gender');
            $table->string('contact');
            $table->string('email');
            $table->string('civil_status');
            $table->string('bday');
            $table->string('position');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brgy_officials');
    }
};
