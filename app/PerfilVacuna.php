<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class PerfilVacuna extends Model
{
    protected $table = 'perfilvacunacion';

    protected $fillable = [
      'id',
      'id_mascota',
      'id_vacuna',
      'fecha_aplicacion',
      'fecha_notificacion_vacuna'
    ];
}
