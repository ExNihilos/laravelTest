<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('developers')) {
            Schema::create('developers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->double('rating')->nullable();
                $table->string('country')->nullable();
                $table->string('headquarter')->nullable();
                $table->year('foundation_year')->nullable();
                $table->string('parent_company')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('developers');
    }
}
