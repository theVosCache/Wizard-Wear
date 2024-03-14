<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();

            $table->morphs('attached');
            $table->integer('index');
            $table->string('type');
            $table->json('data');

            $table->timestamps();
            $table->softDeletes();
        });
    }
};
