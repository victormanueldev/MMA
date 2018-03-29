<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Alimentacion extends Model
{
    protected $table = 'alimentacion';

    protected $fillable = [
    	'id',
    	'tipo_alimento',
    	'marca',
    	'ultima_compra',
    	'frecuencia_compra',
    	'cantidad_compra',
      'fecha_notificacion',
    	'id_user'
    ];
}
