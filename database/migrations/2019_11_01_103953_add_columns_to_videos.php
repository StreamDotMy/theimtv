<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
                $table->string('genre')->nullable();
                $table->text('casts')->nullable();
                $table->string('director')->nullable();
                $table->string('duration')->nullable();
                $table->string('year_of_release')->nullable();
                $table->string('classification')->nullable();
                $table->datetime('start_date')->nullable();
                $table->datetime('end_date')->nullable();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            //
        });
    }
}
