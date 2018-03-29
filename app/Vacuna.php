<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
      protected $table = 'peluqueria';

      protected $fillable = [
        'id',
        'nombre_vacuna',
        'frecuencia_aplicacion',
        'etiqueta'
      ];
}
