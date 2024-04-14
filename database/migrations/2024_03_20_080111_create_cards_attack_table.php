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
        Schema::create('cardsattack', function (Blueprint $table) {
            $table->id();
            $table->string('element');
            $table->integer('energyCost');
            $table->string('cardName');
            $table->string('cardImage');
            $table->string('cardBasicDescription');
            $table->string('cardGoldDescription');
            $table->string('type');
            $table->integer('AttackLeft');
            $table->integer('AttackFront');
            $table->integer('AttackRight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardsattack');
    }
};
