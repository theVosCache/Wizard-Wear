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
        Schema::create('dnd_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dungeon_master_id');
            $table->timestamp('start_at');
            $table->string('location');
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
        Schema::dropIfExists('dnd_sessions');
    }
};
