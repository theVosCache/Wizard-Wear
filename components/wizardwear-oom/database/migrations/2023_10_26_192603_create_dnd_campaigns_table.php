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
        Schema::create('dnd_campaigns', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->foreignId('dungeon_master_id');
            $table->string('name');
            $table->dateTime('next_session')->nullable();
            $table->string('location')->nullable();

            $table->json('data')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dungeon_master_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dnd_campaigns');
    }
};
