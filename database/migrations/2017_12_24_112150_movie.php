<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cover')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_url')->nullable();
            $table->string('small_url')->nullable();
            $table->longText('introduction')->nullable();
            $table->string('download');
            $table->string('realname')->nullable();
            $table->integer('year')->nullable();
            $table->string('place')->nullable();
            $table->string('category')->nullable();
            $table->string('language')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('file_format')->nullable();
            $table->string('video_size')->nullable();
            $table->string('film_length')->nullable();
            $table->string('director')->nullable();
            $table->text('cast')->nullable();
            $table->string('douban_score')->nullable();
            $table->integer('is_banner')->default(0);
            $table->integer('is_small')->default(0);
            $table->integer('is_good')->default(0);
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
        Schema::dropIfExists('movies');
    }
}
