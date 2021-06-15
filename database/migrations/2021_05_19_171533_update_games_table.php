<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('games', function (Blueprint $table) {
//            $table->json('genres')->nullable();
//        });

//        if(!Schema::hasTable('reviews')) {
//            Schema::table('reviews', function (Blueprint $table) {
//                $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->change();
//            });
//        }

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('games', function (Blueprint $table) {
//            $table->dropColumn('genres');
//        });
    }
}
