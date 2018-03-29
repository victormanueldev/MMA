<?php

namespace MundoMascotasApp\Http\Controllers\Auth;

use MundoMascotasApp\User;
use MundoMascotasApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'tipo_documento' => 'required|string',
          'numero_documento' => 'required|max:12|unique:users',
          'nombres' => 'required|string|max:30',
          'apellidos' => 'required|string|max:40',
          'genero' => 'required|string|',
          'fecha_nacimiento' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'barrio' => 'required|string|max:30',
          'direccion' => 'required|string|max:45',
          'telefono_fijo' => 'max:10',
          'telefono_movil' => 'required|string|max:10|min:10',
          'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \MundoMascotasApp\User
     */
    protected function create(array $data)
    {
        return User::create([
            'tipo_documento' => $data['tipo_documento'],
            'numero_documento' => $data['numero_documento'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'genero' => $data['genero'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'barrio' => $data['barrio'],
            'direccion' => $data['direccion'],
            'telefono_fijo' => $data['telefono_fijo'],
            'telefono_movil' => $data['telefono_movil'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
