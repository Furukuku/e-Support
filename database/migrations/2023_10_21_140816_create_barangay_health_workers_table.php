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
        Schema::create('barangay_health_workers', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->integer('assigned_zone');
            $table->boolean('is_active')->default(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangay_health_workers');
    }
};
