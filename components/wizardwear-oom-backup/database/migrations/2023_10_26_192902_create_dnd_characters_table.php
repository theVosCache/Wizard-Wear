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
        Schema::create('dnd_characters', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('user_id');
            $table->foreignId('character_id');
            $table->foreignId('dnd_campaign_id')->nullable();

            $table->integer('level')->default(1);
            $table->integer('current_hit_points')->nullable();
            $table->integer('total_hit_points')->nullable();

            $table->integer('initiative')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('dexterity')->nullable();
            $table->integer('constitution')->nullable();
            $table->integer('intelligence')->nullable();
            $table->integer('wisdom')->nullable();
            $table->integer('charisma')->nullable();
            $table->integer('armor_class')->nullable();

            $table->json('data')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('character_id')->references('id')->on('characters');
            $table->foreign('dnd_campaign_id')->references('id')->on('dnd_campaigns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dnd_characters');
    }
};
