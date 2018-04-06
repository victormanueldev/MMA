<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeluqueriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peluqueria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('servicio', 5);
            $table->string('especificacion_corte', 60);
            $table->date('fecha_peluqueria');
            $table->time('hora_peluqueria');
            $table->string('precio', 5);
            $table->string('estado', 8)->default('Nuevo');
            $table->integer('id_mascota')->unsigned();
            $table->foreign('id_mascota')->references('id')->on('mascotas');
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
        Schema::dropIfExists('peluqueria');
    }
}
