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
        Schema::create('barangay_clearances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('zone');
            $table->string('purpose');
            $table->timestamp('date_issued')->nullable();
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
        Schema::dropIfExists('barangay_clearances');
    }
};
