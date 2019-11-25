<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    
        public function up()
        {
            Schema::table('users', function (Blueprint $table) {
               
                // add column to users table
                $table->enum('user_level',['member','editor','admin','vendor'])
                        ->default('member')
                        ->after('password');
            });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                // delete column during rollback
                $table->dropColumn('user_level');
            });
        }

    
}
