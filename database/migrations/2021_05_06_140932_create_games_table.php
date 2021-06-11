<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('games')) {
            Schema::create('games', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('developer')->nullable();
                $table->string('publisher')->nullable();
                $table->string('genre')->nullable();
                $table->text('description')->nullable();
                $table->date('release_date')->nullable();
                $table->integer('metacritic')->nullable();
                $table->string('poster')->nullable();
                $table->integer('price')->nullable();
                $table->integer('sales')->nullable()->default(0);

                $table->timestamps();

//            $table->foreign('developer')->references('name')->on('developers');
//            $table->foreign('publisher')->references('name')->on('publishers');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
