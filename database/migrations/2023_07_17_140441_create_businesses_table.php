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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('profile');
            $table->string('biz_clearance');
            $table->string('biz_name');
            $table->string('biz_address');
            $table->string('biz_nature');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('mobile_verify_code')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('mobile_verify_code_exp')->nullable();
            $table->boolean('is_approved')->default(false); // false/0 => not approved, true/1 => approved
            $table->boolean('is_active')->default(true); // false/0 => not active, true/1 => active
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
        Schema::dropIfExists('businesses');
    }
};
