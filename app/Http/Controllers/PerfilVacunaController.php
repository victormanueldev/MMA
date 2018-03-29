<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\PerfilVacuna;
use Carbon\Carbon;

class PerfilVacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $fechaActual = $now->toDateString();
        $users = DB::table('perfilvacunacion')
                ->join('mascotas', 'mascotas.id', '=', 'perfilvacunacion.id_mascota')
                ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                ->select('users.nombres', 'users.telefono_movil', 'users.foto')
                ->where('perfilvacunacion.fecha_notificacion_vacuna', $fechaActual)
                ->get();
        $admin = auth('admins')->user()->nombres;
        return view('admin.notificacion-vacunas', compact('users', 'admin'));
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
        $fechaCarbon = Carbon::parse($request->fecha_aplicacion);
        $perfil = new PerfilVacuna();
        $perfil->id_mascota = $request->id_mascota;
        $perfil->id_vacuna = $request->id_vacuna;
        $perfil->fecha_aplicacion = $request->fecha_aplicacion;
        if($request->id_vacuna == '4' || $request->id_vacuna == '9'){
            $perfil->fecha_notificacion_vacuna = $fechaCarbon->addYear();
        }elseif ($request->id_vacuna == '7' || $request->id_vacuna == '8') {
          $perfil->fecha_notificacion_vacuna = '2018-01-01';
        }
        else {
          $perfil->fecha_notificacion_vacuna = $fechaCarbon->addDays(15);
        }
        $perfil->save();
        return redirect('/perfil-mascota/'.$perfil->id_mascota);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = DB::table('perfilvacunacion')
                  ->join('mascotas', 'mascotas.id', '=', 'perfilvacunacion.id_mascota')
                  ->join('vacunas', 'vacunas.id', '=', 'perfilvacunacion.id_vacuna')
                  ->select('vacunas.nombre_vacuna', 'vacunas.etiqueta', 'perfilvacunacion.fecha_aplicacion', 'mascotas.nombre_mascota')
                  ->where('perfilvacunacion.id_mascota', $id)
                  ->get();
        $mascota = Mascota::find($id);
        return view('perfil-vacunacion', compact('perfil', 'mascota'));
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

    /**
     * Envia los parametros para la API SMS
     * Envia SMS a todos los usuarios de la BD
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function smsMasivos(Request $request)
    {
      $now = Carbon::now();
      $fechaActual = $now->toDateString();
      //Consulta todos los telefonos moviles de los clientes registrados en la BD
      $tels = DB::table('perfilvacunacion')
              ->join('mascotas', 'mascotas.id', '=', 'perfilvacunacion.id_mascota')
              ->join('users', 'users.id', '=', 'mascotas.id_usuario')
              ->select('users.nombres', 'users.telefono_movil', 'users.foto')
              ->where('perfilvacunacion.fecha_notificacion_vacuna', $fechaActual)
              ->get();
      //Recorre $tels y guarda todos los numeros en un array
      for ($i=0; $i < count($tels) ; $i++) {
        $array[$i] = $tels[$i];
      }
      //Crea una Coleccion de los Telefonos Moviles
      $coleccion = collect($array);
      //Separa por comas todos los Telefono moviles de la coleccion y los guarda en $numeros como string
      $numeros = $coleccion->implode('telefono_movil', ',');

      $url = 'https://api.hablame.co/sms/envio/';
      $sms = $request->sms;
      $data = array(
      	'cliente' => 10011523, //Numero de cliente
      	'api' => '64Afo8L6xuffckNUS0O6AQb0G7r6ho', //Clave API suministrada
      	'numero' => $numeros, //numero o numeros telefonicos a enviar el SMS (separados por una coma ,)
      	'sms' => $sms, //Mensaje de texto a enviar
      	'fecha' => '', //(campo opcional) Fecha de envio, si se envia vacio se envia inmediatamente (Ejemplo: 2017-12-31 23:59:59)
      	'referencia' => 'Referenca Envio Hablame', //(campo opcional) Numero de referencio ó nombre de campaña
      );
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
          )
      );

      $context  = stream_context_create($options);
      $result = json_decode((file_get_contents($url, false, $context)), true);

      if ($result["resultado"]===1) {//Validar que no haya un error en el $data
        \Flash::error('SMS No enviado')->important();
        return redirect('/notificacion-vacunas');

      }
      if($result["sms_procesados"] != 0){
        for ($i=0; $i < count($result["sms"]) ; $i++) {
          if ($result["sms"][$i+1]["resultado_t"]=="No tiene saldo disponible") {
            \Flash::error('¡No tienes saldo disponible!')->important();
            return redirect('/notificacion-vacunas');

          } elseif ($result["sms"][$i+1]["resultado"]===1) {
            \Flash::error('¡Ha ocurrido un error al enviar algunos SMS!')->important();
            return redirect('/notificacion-vacunas');

          }else {
            \Flash::success('Se han enviado los SMS exitosamente')->important();
            return redirect('/notificacion-vacunas');

          }
        }
      }

    }
}
