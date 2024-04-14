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
        Schema::create('cards_hero', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('heroImage');
            $table->string('talentDescription');
            $table->integer('talentCooldown');
            $table->string('talentType');
            $table->integer('talentValue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards_hero');
    }
};
