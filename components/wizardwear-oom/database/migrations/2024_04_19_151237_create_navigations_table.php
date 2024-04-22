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
        Schema::create('cms_navigations', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->integer('level')->default(0);
            $table->integer('order')->default(0);
            $table->string('label');

            $table->foreignId('parent_id')->nullable();
            $table->foreignId('page_id')->nullable();

            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('cms_navigations');
            $table->foreign('page_id')->references('id')->on('cms_pages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigations');
    }
};
