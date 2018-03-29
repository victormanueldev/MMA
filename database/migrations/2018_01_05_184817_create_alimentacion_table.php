<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_alimento', 13);
            $table->string('marca', 45);
            $table->date('ultima_compra');
            $table->string('frecuencia_compra', 11);
            $table->date('fecha_notificacion');
            $table->string('cantidad_compra',13);
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('alimentacion');
    }
}
