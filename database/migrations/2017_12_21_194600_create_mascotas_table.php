<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_mascota',8);
            $table->string('nombre_mascota',45);
            $table->string('sexo_mascota',10);
            $table->string('foto_mascota',99)->default('default-pet.jpg');
            $table->date('fecha_nacimiento_mascota');
            $table->string('raza',45);
            $table->string('color',45);
            $table->string('peso', 17);
            $table->string('tamano', 7);
            $table->string('esterilizado', 2);
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }

}
