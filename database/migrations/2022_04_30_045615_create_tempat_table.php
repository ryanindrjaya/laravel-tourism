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
        Schema::create('tempat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('address');
            $table->text('mapUrl');
            $table->integer('ticket');
            $table->string('rating');
            $table->string('seninJumat');
            $table->string('sabtuMinggu');
            $table->boolean('disabilities');
            $table->boolean('parkir');
            $table->boolean('wifi');
            $table->boolean('isHeadline');
            $table->boolean('isIcon');
            $table->string('url');
            $table->string('image');
            /* 
            [{
                image: filename,
                desc: description
            }]
            */
            $table->text('tags');
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
        Schema::dropIfExists('tempat');
    }
};
