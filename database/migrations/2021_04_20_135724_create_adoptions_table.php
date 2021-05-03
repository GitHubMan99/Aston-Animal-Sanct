<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('animalID')->unsigned();
            $table->bigInteger('userID')->unsigned();
            $table->enum('status', ['Pending', 'Approved', 'Denied'])->default('Pending');
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('animalID')->references('id')->on('animals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoptions');
    }
}
