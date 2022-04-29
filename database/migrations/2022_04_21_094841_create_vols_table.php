<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lieu_depart_id');
            $table->unsignedBigInteger('lieu_arrivee_id');
            $table->dateTime('date_depart');
            $table->unsignedBigInteger('avion_id');
            $table->timestamps();

            $table->foreign('lieu_depart_id')->references('id')
                ->on('lieus')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('lieu_arrivee_id')->references('id')
                ->on('lieus')
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
        Schema::dropIfExists('vols');
    }
}
