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
        Schema::create('chat_bot_patterns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_bot_tag_id')->constrained()->onDelete('cascade');
            $table->string('keyword')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_bot_patterns');
    }
};
