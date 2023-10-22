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
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('house');

            $table->integer('level')->default(1);
            $table->integer('strength')->nullable();
            $table->integer('dexterity')->nullable();
            $table->integer('intelligence')->nullable();
            $table->integer('wisdom')->nullable();
            $table->integer('charisma')->nullable();
            $table->integer('constitution')->nullable();

            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
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
