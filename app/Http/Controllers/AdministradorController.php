<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\Cita;
use Carbon\Carbon;

class AdministradorController extends Controller
{

    use AuthenticatesUsers;

    function __construct()
    {
        $this->middleware('auth:admins', ['only' => ['secret']]);
    }

    public function showLoginForm()
    {
        return view('auth.login-admins');
    }

    protected function guard()
    {
        return Auth::guard('admins');
    }

    public function authenticated()
    {
        return redirect('/home-admin');
    }

    public function secret()
    {
      //Obtener Fecha Actual
      $now = Carbon::now();
      $fechaActual = $now->toDateString();
      //Obtener total de registros de cada tabla
      $totalClientes = DB::table('users')
                      ->count();
      $totalMascotas = DB::table('mascotas')
                      ->count();
      $totalCitas = DB::table('citas')
                    ->count();
      $totalPeluquerias = DB::table('peluqueria')
                          ->count();
      $totalAlimentiacion = DB::table('alimentacion')
                          ->count();
      //Obtener registros nuevos
      $nuevosClientes = DB::table('users')
                        ->where('users.created_at', $fechaActual)
                        ->count();
      $nuevasMascotas = DB::table('mascotas')
                        ->where('created_at', $fechaActual)
                        ->count();
      $citasHoy = DB::table('citas')
                  ->where('fecha_cita', $fechaActual)
                  ->count();
      $turnosHoy = DB::table('peluqueria')
                  ->where('fecha_peluqueria', $fechaActual)
                  ->count();
      $notificacionVacunas = DB::table('perfilvacunacion')
              ->join('mascotas', 'mascotas.id', '=', 'perfilvacunacion.id_mascota')
              ->join('users', 'users.id', '=', 'mascotas.id_usuario')
              ->select('users.nombres', 'users.telefono_movil', 'users.foto')
              ->where('perfilvacunacion.fecha_notificacion_vacuna', $fechaActual)
              ->count();
      //Nombres de Administradores
      $admin = auth('admins')->user()->nombres;
      //Retornar la vista con todas las variables
        return view('admin.home-admin', compact(
          'admin',
          'totalClientes',
          'totalMascotas',
          'totalCitas',
          'totalPeluquerias',
          'totalAlimentiacion',
          'nuevosClientes',
          'nuevasMascotas',
          'citasHoy',
          'turnosHoy',
          'notificacionVacunas'
        ));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home-admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
