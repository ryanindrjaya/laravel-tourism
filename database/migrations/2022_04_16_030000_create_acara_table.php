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
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->string('desa');
            $table->string('kecamatan');
            $table->text('mapUrl');
            $table->string('image');
            $table->string('imageArray');
            $table->string('ticket');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('acara');
    }
};
