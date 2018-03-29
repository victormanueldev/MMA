<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use MundoMascotasApp\Http\Requests\PeluqueriaRequest;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\Peluqueria;
use Carbon\Carbon;

class PeluqueriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $now = Carbon::now();
      $fechaActual = $now->toDateString();//Obtener solo la fecha
      $peluquerias = DB::table('peluqueria')
                    ->join('mascotas', 'mascotas.id', '=', 'peluqueria.id_mascota')
                    ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                    ->select('peluqueria.id AS id_peluqueria', 'peluqueria.*', 'mascotas.nombre_mascota', 'mascotas.sexo_mascota','mascotas.peso', 'mascotas.tamano', 'mascotas.raza', 'mascotas.foto_mascota', 'users.*')
                    ->where('peluqueria.fecha_peluqueria', $fechaActual)
                    ->get();
      //Contador de peluquerias
      $totalPeluquerias = DB::table('peluqueria')
                          ->count();
      //Contador de turnos hoy
      $turnosHoy = DB::table('peluqueria')
                  ->where('fecha_peluqueria', $fechaActual)
                  ->count();
      $admin = auth('admins')->user()->nombres;
      return view('admin.peluquerias', compact('peluquerias', 'admin', 'totalPeluquerias', 'turnosHoy'));
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
    public function store(PeluqueriaRequest $request)
    {
        $peluqueria = new Peluqueria();
        $ahora = Carbon::now();//Obtener la hora y la fecha acutal
        $fechaActual = $ahora->toDateString();//Obtener solo la fecha
        $horaActual = $ahora->toTimeString();//Obtener solo la hora

        //Validar que la hora de la cita sea mayor a la actual
      if ($request->fecha_peluqueria == $fechaActual && $request->hora_peluqueria < $horaActual) {
            \Flash::error('No se puede agendar una cita en horas anteriores a la actual');//Mensaje de Error
            return redirect('/confirmar-cita/'.$request->id_mascota);
        }

        // //Validar que no se agenden citas despues de las 3pm de la fecha actual
        // if ($request->fecha_peluqueria == $fechaActual && $ahora->hour >= 15) {
        //     \Flash::error('No se puede agendar citas HOY despues de las 3:00 pm');
        //     return redirect('/confirmar-cita/'.$request->id_mascota);
        // }

        //Obtener todas las fechas y las horas de las citas agendadas de la tabla citas de la BD
        $peluquerias = DB::table('peluqueria')
                ->select('peluqueria.fecha_peluqueria','peluqueria.hora_peluqueria')
                ->get();

        //Recorrer el resultado de la consulta (por objetos)
        foreach ($peluquerias as $objPeluqueria) {
            if ($objPeluqueria->fecha_peluqueria == $request->fecha_peluqueria && $objPeluqueria->hora_peluqueria == $request->hora_peluqueria) {
                \Flash::error('Este Turno ya esta ocupado, intenta agendar tu cita en otro horario');
                return redirect('/confirmar-cita/'.$request->id_mascota);

            }
        }


        $peluqueria->servicio = $request->servicio;
        $peluqueria->especificacion_corte = $request->especificacion_corte;
        $peluqueria->fecha_peluqueria = $request->fecha_peluqueria;
        $peluqueria->hora_peluqueria = $request->hora_peluqueria;
        $peluqueria->id_mascota = $request->id_mascota;
        if($request->servicio == "Combo"){
          $peluqueria->precio = $request->precioCombo;
        }else {
          $peluqueria->precio = $request->precio;
        }

        $peluqueria->save();
        \Flash::success('Su turno se ha registrado con éxito! Ya puede volver al inicio');//Mensaje de Exito
        return redirect('/confirmar-cita/'.$request->id_mascota);
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
        $peluqueria = Peluqueria::find($id);
        $peluqueria->estado = $request->estado;
        $peluqueria->save();
        return redirect()->route('peluquerias-index');
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

    /**
     * Lista todas las peluquerias registradas en la BD.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexPeluquerias()
    {
      $peluquerias = DB::table('peluqueria')
              ->join('mascotas', 'mascotas.id', '=', 'peluqueria.id_mascota')
              ->join('users', 'users.id', '=', 'mascotas.id_usuario')
              ->select('mascotas.nombre_mascota', 'peluqueria.*','users.nombres')
              ->get();
      $admin = auth('admins')->user()->nombres;
      $contadorTurnos = DB::table('peluqueria')
                      ->count();
      $contadorTurnoNuevo = DB::table('peluqueria')
                            ->where('peluqueria.estado', 'Nuevo')
                            ->count();
      $contadorTurnoReivsado = DB::table('peluqueria')
                            ->where('peluqueria.estado', 'Revisado')
                            ->count();
      return view('admin.peluqueria-index', compact('peluquerias', 'contadorTurnos', 'admin', 'contadorTurnoNuevo', 'contadorTurnoReivsado'));
    }
}
