<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Peluqueria extends Model
{
    protected $table = 'peluqueria';

    protected $fillable = [
    	'id',
    	'servicio',
    	'especificacion_corte',
    	'fecha_peluqueria',
    	'hora_peluqueria',
      'estado',
      'precio',
    	'id_mascota'
    ];
}
