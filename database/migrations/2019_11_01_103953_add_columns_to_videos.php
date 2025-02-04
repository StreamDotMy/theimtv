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
                $table->integer('year_of_release')->nullable();
                $table->enum('classifications',[ 'U', 'P13' , '18'])->default('U');
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
    
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
