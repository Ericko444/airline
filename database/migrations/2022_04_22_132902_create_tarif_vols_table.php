<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_vols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_age_id');
            $table->unsignedBigInteger('categorie_id');
            $table->integer('montant');
            $table->unsignedBigInteger('vol_id');
            $table->timestamps();

            $table->foreign('categorie_age_id')->references('id')
                ->on('categorie_ages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('categorie_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vol_id')->references('id')
                ->on('vols')
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
        Schema::dropIfExists('tarif_vols');
    }
}
