<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use MundoMascotasApp\User;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\Cita;
use MundoMascotasApp\Peluqueria;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;//Usuario Logueado
        //Seleccionar las mascotas que perteneces al usuario logeado
        $mascotas = DB::table('mascotas')
                    ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                    ->select('mascotas.*')
                    ->where('users.id', $user)
                    ->get();
        //Contar las Mascotas que tiene el Usuario logueado
        $contadorMascotas = DB::table('mascotas')
                            ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                            ->where('users.id', $user)
                            ->count();
        //Contar las Citas que tiene el Usuario Logueado
        $contadorCitas = DB::table('citas')
                            ->join('mascotas', 'mascotas.id', '=', 'citas.id_mascota')
                            ->join('users','users.id', '=', 'mascotas.id_usuario')
                            ->where('users.id', $user)
                            ->count();

        //Contar Citas de peluqueria que tiene el usuario logueado
        $contadorPeluqueria = DB::table('peluqueria')
                            ->join('mascotas', 'mascotas.id', '=', 'peluqueria.id_mascota')
                            ->join('users','users.id', '=', 'mascotas.id_usuario')
                            ->where('users.id', $user)
                            ->count();
        //Validador de Alimentacion enviada por el usuario
        $alimentacion = DB::table('alimentacion')
                        ->join('users', 'users.id' ,'=', 'alimentacion.id_user')
                        ->where('users.id', $user)
                        ->count();
        //Retornar la Vista con las variables
       return view('home', compact('mascotas', 'contadorMascotas', 'contadorCitas', 'contadorPeluqueria', 'alimentacion'));
    }

}
