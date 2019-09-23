<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0);

            $table->string('filename')->nullable();
            $table->integer('length')->default(0);
            $table->integer('size')->default(0);
            $table->integer('processing_time')->default(0);
            $table->integer('processing_status')->default(0);
            $table->boolean('is_uploaded')->default(0);
            $table->boolean('is_published')->default(0);

            $table->string('title');
            $table->mediumText('synopsis');
            $table->mediumText('description');

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
        Schema::dropIfExists('videos');
    }
}
