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
        // Potion	Rarity	Type	Year	5e Equivalent	Effects	Flawed	Exceptional	Galleon Price
        Schema::create('dnd_potions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name')->nullable();
            $table->string('rarity')->nullable();
            $table->string('potion_type')->nullable();
            $table->integer('learned_in_year')->nullable();
            $table->string('dnd_equivalent')->nullable();
            $table->text('effects')->nullable();
            $table->text('flawed')->nullable();
            $table->text('exceptional')->nullable();
            $table->string('galleon_price')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dnd_potions');
    }
};
