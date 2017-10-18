<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->string('horsepower')->nullable()->change();
            $table->integer('number_of_doors')->nullable()->change();
            $table->integer('number_of_seats')->nullable()->change();
            $table->string('transmission')->nullable()->change();
            $table->string('fuel')->nullable()->change();
            $table->string('video')->nullable();
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
    }
}
