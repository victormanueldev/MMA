<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilvacunacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilvacunacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mascota')->unsigned();
            $table->integer('id_vacuna')->unsigned();
            $table->date('fecha_aplicacion');
            $table->date('fecha_notificacion_vacuna')->nullable();
            $table->foreign('id_mascota')->references('id')->on('mascotas');
            $table->foreign('id_vacuna')->references('id')->on('vacunas');
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
        Schema::dropIfExists('perfilvacunacion');
    }
}
