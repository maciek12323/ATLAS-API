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
        Schema::create('cards_defend', function (Blueprint $table) {
            $table->id();
            $table->string('element');
            $table->integer('energyCost');
            $table->string('cardName');
            $table->string('cardImage');
            $table->string('cardBasicDescription');
            $table->string('cardGoldDescription');
            $table->string('type');
            $table->integer('defLeft');
            $table->integer('defFront');
            $table->integer('defRight');
            $table->integer('heal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards_defend');
    }
};
