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
        Schema::create('card_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('card_icon')->nullable();
            $table->json('card_title');
            $table->json('card_description');
            $table->foreignId('aboutId')->constrained('about_uses')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_abouts');
    }
};
