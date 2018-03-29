<?php

namespace MundoMascotasApp;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administradores extends Authenticatable
{
    protected $table = 'administradores';

    protected $fillable = [
    	'id',
    	'nombres',
    	'email',
    	'password',
    ];
}
