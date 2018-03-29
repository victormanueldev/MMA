<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('tipo_documento',30);
          $table->double('numero_documento',12)->unique();
          $table->string('nombres',30);
          $table->string('apellidos',40);
          $table->string('barrio',30);
          $table->string('direccion',45);
          $table->string('telefono_fijo',10);
          $table->string('telefono_movil',15);
          $table->string('foto',99)->default('default.jpg');
          $table->date('fecha_nacimiento');
          $table->string('genero',12);
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
