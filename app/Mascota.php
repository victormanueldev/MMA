<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
    	'id',
    	'tipo_mascota',
    	'nombre_mascota',
    	'sexo_mascota',
    	'foto_mascota',
    	'fecha_nacimiento_mascota',
    	'raza',
    	'color',
    	'peso',
    	'tamano',
      'esterilizado',
      'nombre_ultima_vacuna',
      'ultima_vacuna',
    	'id_usuario',

    ];

   public function user()
    {
    	return $this->belongsTo('MundoMascotasApp\User');
    }

    public function citas()
     {
        return $this->hasMany('MundoMascotasApp\Cita');
     }
}
