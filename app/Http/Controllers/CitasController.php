<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use MundoMascotasApp\Http\Requests\CitasRequest;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\Cita;
use MundoMascotasApp\Disponibilidad;
use Carbon\Carbon;
use Auth;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //Consultar la Mascota por el $id de la URL
        $dt = Carbon::now();
        $fechaActual = $dt-> toDateString();
        $mascotas = Mascota::find($id);
        $disponibildad = Disponibilidad::all();
        
        $fi = '';
        $ff = '';
        $mot = '';
        $jor = '';
        foreach ($disponibildad as $disp) {
            if($disp-> fecha_inicio == $fechaActual){
                $fi = $disp-> fecha_inicio;
                $ff = $disp-> fecha_fin;
                $mot = $disp-> motivo;
                $jor = $disp-> jornada;
            }
        }

        return view('confirmar-cita', compact(
            'mascotas',
            'fi',
            'ff',
            'mot',
            'jor',
            'fechaActual'
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitasRequest $request)
    {

        $cita = new Cita();//Instancia de la clase
        $disponibildad = Disponibilidad::all();
        $ahora = Carbon::now();//Obtener la hora y la fecha acutal
        $fechaActual = $ahora->toDateString();//Obtener solo la fecha
        $horaActual = $ahora->toTimeString();//Obtener solo la hora

        //Validar que la hora de la cita sea mayor a la actual
        if ($request->fecha_cita == $fechaActual && $request->hora_cita < $horaActual) {
            \Flash::error('No se puede agendar una cita en horas anteriores a la actual');//Mensaje de Error
            return redirect('/confirmar-cita/'.$request->id_mascota);
        }

        //Validar que la hora de la cita sea mayor a la actual
        if ($request->fecha_cita < $fechaActual) {
            \Flash::error('No se puede agendar una cita en una fecha anterior a la actual');//Mensaje de Error
            return redirect('/confirmar-cita/'.$request->id_mascota);
        }

        //Validar que la cita no se agende en un periodo con disponibilidad nula
        foreach ($disponibildad as $disp ) {
           if($request-> fecha_cita == $disp-> fecha_inicio ){
                \Flash::error('No se puede agendar la cita porque '.$disp-> motivo);//Mensaje de Error
                return redirect('/confirmar-cita/'.$request->id_mascota);
           }elseif ($request-> fecha_cita > $disp-> fecha_inicio && $request-> fecha_cita <= $disp-> fecha_fin) {
                \Flash::error('No se puede agendar la cita porque no hay disponibilidad');//Mensaje de Error
                return redirect('/confirmar-cita/'.$request->id_mascota);
           }
        }

        // //Validar que no se agenden citas despues de las 3pm de la fecha actual
        // if ($request->fecha_cita == $fechaActual) {
        //     \Flash::error('No se puede agendar citas HOY despues de las 3:00 pm');
        //     return redirect('/confirmar-cita/'.$request->id_mascota);
        // }

        //Obtener todas las fechas y las horas de las citas agendadas de la tabla citas de la BD
        $citas = DB::table('citas')
                ->select('citas.fecha_cita','citas.hora_cita')
                ->get();

        //Recorrer el resultado de la consulta (por objetos)
        foreach ($citas as $objCita) {
            if ($objCita->fecha_cita == $request->fecha_cita && $objCita->hora_cita == $request->hora_cita) {
                \Flash::error('Este Turno ya esta ocupado, intenta agendar tu cita en otro horario');
                return redirect('/confirmar-cita/'.$request->id_mascota);

            }
        }

        //Establecer atributos y campos del request
        $cita->motivo = $request->motivo;
        $cita->fecha_sintomas = $request->fecha_sintomas;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora_cita = $request->hora_cita;
        $cita->id_mascota = $request->id_mascota;
        $cita->estado = $request->estado;

        $cita->save();//Guardar en la BD
        \Flash::success('¡Cita creada con éxito! Ya puedes regresar al inicio.');//Mensaje de Exito
        return redirect('/confirmar-cita/'.$request->id_mascota);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $ahora = Carbon::now();//Obtener la hora y la fecha acutal
      $fechaActual = $ahora->toDateString();//Obtener solo la fecha
      $citas = DB::table('citas')
              ->join('mascotas','mascotas.id', '=', 'citas.id_mascota')
              ->join('users','users.id', '=', 'mascotas.id_usuario')
              ->select('citas.id AS id_cita', 'citas.*','mascotas.id AS mascota_id', 'mascotas.*', 'users.nombres', 'users.numero_documento')
              ->where('citas.fecha_cita', $fechaActual)
              ->get();
      //Contador de total de Citas
      $totalCitas = DB::table('citas')
                    ->count();
      //Contador de citas hoy
      $citasHoy = DB::table('citas')
                  ->where('fecha_cita', $fechaActual)
                  ->count();
      $admin = auth('admins')->user()->nombres;
      return view('admin.citas', compact('citas','admin', 'totalCitas', 'citasHoy'));
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

        $cita = Cita::find($id);
        $cita->estado = $request->estado;
        $cita->save();
        return redirect()->route('citas-index');
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
     * Lista todas las citas medicas regitradas.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCitas()
    {
      $citas = DB::table('citas')
              ->join('mascotas', 'mascotas.id', '=', 'citas.id_mascota')
              ->join('users', 'users.id', '=', 'mascotas.id_usuario')
              ->select('mascotas.nombre_mascota', 'citas.*','users.nombres')
              ->get();
      $admin = auth('admins')->user()->nombres;
      $contadorCitas = DB::table('citas')
                      ->count();
      $contadorCitasNuevas = DB::table('citas')
                            ->where('citas.estado', 'Nuevo')
                            ->count();
      $contadorCitasRevisadas = DB::table('citas')
                            ->where('citas.estado', 'Revisado')
                            ->count();
      return view('admin.citas-index', compact('citas', 'contadorCitas', 'admin', 'contadorCitasNuevas', 'contadorCitasRevisadas'));
    }

    /**
     * Lista todas los turnos para citas para verificar disponibildad
     * 
     * @return \Illuminate\Http\Response
     */
    public function indexCitasVue()
    {
        $citas = DB::table('citas')
                ->select('citas.fecha_cita', 'citas.hora_cita')
                ->get();
        return $citas;
    }
}
