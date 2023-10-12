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
        Schema::create('business_clearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('clearance_no')->nullable();
            $table->string('biz_name');
            $table->string('biz_address');
            $table->string('biz_nature');
            $table->string('biz_owner');
            $table->string('owner_address');
            $table->string('proof');
            $table->timestamp('date_issued')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('ctc')->nullable();
            $table->string('issued_at')->nullable();
            $table->date('issued_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_clearances');
    }
};
