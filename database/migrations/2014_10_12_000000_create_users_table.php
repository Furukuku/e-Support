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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile');
            $table->string('verification_img');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->date('bday');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->unique();
            $table->string('mobile_verify_code')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('mobile_verify_code_exp')->nullable();
            $table->string('zone');
            $table->boolean('is_employed');
            $table->string('gender');
            $table->boolean('is_head');
            $table->boolean('can_edit_profiling')->default(false);
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
        Schema::dropIfExists('users');
    }
};
