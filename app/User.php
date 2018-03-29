<?php

namespace MundoMascotasApp;

use Illuminate\Notifications\Notifiable;
use MundoMascotasApp\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id',
      'tipo_documento',
      'numero_documento',
      'nombres',
      'apellidos',
      'barrio',
      'direccion',
      'telefono_fijo',
      'telefono_movil',
      'foto',
      'fecha_nacimiento',
      'genero',
      'email',
      'password',
      'administrador',
      'email',
      'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function mascotas()
    {
      return $this->hasMany('MundoMascotasApp\Mascota');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
