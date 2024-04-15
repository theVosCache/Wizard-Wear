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
        Schema::create('dnd_spells', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->string('name');
            $table->string('dnd_equivalent')->nullable();
            $table->string('description')->nullable();
            $table->string('school_of_magic')->nullable();
            $table->boolean('is_school_of_magic_exclusive')->default(false);
            $table->integer('level')->default(0);
            $table->boolean('is_concentration')->default(false);
            $table->boolean('is_ritual')->default(false);
            $table->boolean('is_dedication')->default(false);
            $table->string('casting_time')->nullable();
            $table->string('range')->nullable();
            $table->string('duration')->nullable();
            $table->string('tags')->nullable();
            $table->text('effects')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spells');
    }
};
