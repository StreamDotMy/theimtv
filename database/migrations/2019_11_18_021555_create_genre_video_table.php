<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_videos', function (Blueprint $table) {
            $table->integer('video_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->foreign('video_id')->references('id')->on('videos')
            ->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')
            ->onDelete('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_videos');
    }
}
