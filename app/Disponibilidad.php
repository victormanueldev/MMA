<?php

namespace MundoMascotasApp;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $filleable = [
        'fecha_inicio',
        'fecha_fin',
        'motivo',
        'jornada'
    ];

}
