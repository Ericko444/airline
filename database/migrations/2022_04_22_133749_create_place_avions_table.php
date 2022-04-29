<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceAvionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_avions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_age_id');
            $table->unsignedBigInteger(
                'categorie_id'
            );
            $table->integer('places');
            $table->unsignedBigInteger('avion_id');
            $table->timestamps();

            $table->foreign('categorie_age_id')->references('id')
                ->on('categorie_ages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('categorie_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('avion_id')->references('id')
                ->on('avions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_avions');
    }
}
