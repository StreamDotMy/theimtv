<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VideoCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_video', function (Blueprint $table) {
            $table->integer('video_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('video_id')->references('id')->on('videos')
            ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('video_categories')
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
        //
        Schema::dropIfExists('category_video');
    }
}
