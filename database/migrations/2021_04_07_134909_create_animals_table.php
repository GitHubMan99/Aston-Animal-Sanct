<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->string('name', 20);
            $table->enum('animal_type', ['Dog', 'Cat', 'Rabbit', 'Hamster', 'Bird', 'Fish', 'Reptile', 'Other'])->default('Dog');
            $table->date('date_of_birth');
            $table->string('description', 256)->nullable();
            $table->string('image', 256)->nullable();
            $table->string('image_2', 256)->nullable();
            $table->string('image_3', 256)->nullable();
            $table->enum('availability', ['Available', 'Unavailable'])->default('Available');
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
        Schema::dropIfExists('animals');
    }
}
