<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasum', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->string('mapUrl');
            $table->string('image');
            $table->string('imageArray');
            $table->string('type');
            $table->string('openAllDay');
            $table->string('disabilitas');
            $table->string('parkiran');
            $table->string('wifi');
            $table->string('tags');
            $table->boolean('isHeadline');
            $table->boolean('isIcon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasum');
    }
};
