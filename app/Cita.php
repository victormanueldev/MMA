<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
    	'id',
    	'motivo',
    	'fecha_sintomas',
    	'fecha_cita',
    	'hora_cita',
    	'id_mascota',

    ];

    public function mascota()
    {
    	return $this->belongsTo('MundoMascotasApp\Mascota');
    }
}
