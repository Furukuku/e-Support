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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('business_id')->nullable()->constrained();
            $table->string('type');
            $table->string('name')->nullable();
            $table->string('zone')->nullable();
            $table->string('purpose')->nullable();
            $table->string('biz_name')->nullable();
            $table->string('biz_address')->nullable();
            $table->string('biz_nature')->nullable();
            $table->string('biz_owner')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('proof')->nullable();
            $table->string('status')->default('Pending');
            $table->boolean('is_used')->default(false);
            $table->string('token');
            $table->boolean('is_released')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
