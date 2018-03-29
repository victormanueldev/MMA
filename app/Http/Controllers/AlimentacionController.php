<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use MundoMascotasApp\Http\Requests\AlimentacionRequest;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\Alimentacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Auth;



class AlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user()->id;
        return view('alimentacion', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = DB::table('users')
              ->select('users.nombres', 'users.foto', 'users.telefono_movil')
              ->get();
      $contUsers = DB::table('users')
              ->select('users.id')
              ->count();
      $admin = auth('admins')->user()->nombres;
        return view('admin.notificacion-masiva', compact('users', 'admin','contUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlimentacionRequest $request)
    {
        //Instanciar Carbon con la fecha de ultima_compra
        $fechaCarbon = Carbon::parse($request->ultima_compra);
        $fechaCarbon->toDateString();
        //Instanciar Alimentacion
        $alimentacion = new Alimentacion();
        $alimentacion->tipo_alimento = $request->tipo_alimento;
        $alimentacion->marca = $request->marca;
        $alimentacion->ultima_compra = $request->ultima_compra;
        $alimentacion->frecuencia_compra = $request->frecuencia_compra;
        $alimentacion->cantidad_compra = $request->cantidad_compra;
        $alimentacion->id_user = $request->id_user;

        //Validar la frecuencia de compra
        if($request->frecuencia_compra == 'diaria'){
         $alimentacion->fecha_notificacion = $fechaCarbon->addDays(1);//Suma dias, dependiendo de la frecuencia_compra
        }elseif ($request->frecuencia_compra == 'semanal') {
          $alimentacion->fecha_notificacion = $fechaCarbon->addWeek();//Suma una SEMANA
        }elseif ($request->frecuencia_compra == 'quincenal') {
          $alimentacion->fecha_notificacion = $fechaCarbon->addDays(15);
        }else{
          $alimentacion->fecha_notificacion = $fechaCarbon->addMonth();//Suma un MES
        }
        //Guardar registro en la BD y Redireccionar al home
        $alimentacion->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $alimentacion = DB::table('alimentacion')
                      ->select('alimentacion.*')
                      ->join('users', 'users.id', '=', 'alimentacion.id_user')
                      ->where('alimentacion.id_user', $id)
                      ->get();
      return view('edit-alimentacion', compact('alimentacion'));
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
        $alimentacion = Alimentacion::find($id);
        $alimentacion->tipo_alimento = $request->tipo_alimento;
        $alimentacion->marca = $request->marca;
        $alimentacion->ultima_compra = $request->ultima_compra;
        $alimentacion->frecuencia_compra = $request->frecuencia_compra;
        $alimentacion->cantidad_compra = $request->cantidad_compra;
        $alimentacion->save();
        return redirect('/home');

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
     * Retorna la vista de periles de compra
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function perfilesView()
    {
      $now = Carbon::now();
      $fechaActual = $now->toDateString();
      $perfiles = DB::table('alimentacion')
                  ->join('users', 'users.id' ,'=','alimentacion.id_user')
                  ->select('users.numero_documento','users.nombres','users.direccion','users.telefono_movil','users.foto', 'users.apellidos', 'alimentacion.*')
                  ->get();

      $admin = auth('admins')->user()->nombres;
      return view('admin.perfiles-compra', compact('admin', 'perfiles', 'fechaActual'));
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
      //Consulta todos los telefonos moviles de los clientes registrados en la BD
      $tels = DB::table('users')
              ->select('users.telefono_movil')
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
      	'referencia' => '', //(campo opcional) Numero de referencio ó nombre de campaña
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
        return redirect('/notificaciones');

      }
      if($result["sms_procesados"] != 0){
        //Recorrer todos los SMS procesados
        for ($i=0; $i < count($result["sms"]) ; $i++) {
          //Validar el resultado de texto de la peticion de cada SMS $result["sms"]["x"]["resultado_t"]
          if ($result["sms"][$i+1]["resultado_t"]=="No tiene saldo disponible") {
            \Flash::error('¡No tienes saldo disponible!')->important();
            return redirect('/notificaciones');
          } elseif ($result["sms"][$i+1]["resultado"]===1) {//Validar el resultado de la peticion de cada SMS $result["sms"]["x"]["resultado"]
            \Flash::error('¡Ha ocurrido un error al enviar algunos SMS!')->important();
            return redirect('/notificaciones');
          }else {
            \Flash::success('Se han enviado los SMS exitosamente')->important();
            return redirect('/notificaciones');
          }
        }
      }


    }

    /**
     * Envia los parametros para la API SMS
     * Envia SMS al usuario seleccionado
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enviarSMS(Request $request)
    {
      //URL para el envio de SMS
      $url = 'https://api.hablame.co/sms/envio/';
      //Datos del Request
      $numero = $request->telefono_movil;
      $sms = $request->sms;
      //Parametros para el envio de SMS
      $data = array(
      	'cliente' => 10011523, //Numero de cliente
      	'api' => '64Afo8L6xuffckNUS0O6AQb0G7r6ho', //Clave API suministrada
      	'numero' => $numero, //numero o numeros telefonicos a enviar el SMS (separados por una coma ,)
      	'sms' => $sms, //Mensaje de texto a enviar
      	'fecha' => '', //(campo opcional) Fecha de envio, si se envia vacio se envia inmediatamente (Ejemplo: 2017-12-31 23:59:59)
      	'referencia' => 'Referenca Envio Hablame', //(campo opcional) Numero de referencio ó nombre de campaña
      );
      //Array con las opciones del envio (HTTP/POST)
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
          )
      );
      //Realiza el envio a la URL y devuelve el resultado de la petición
      $context  = stream_context_create($options);
      $result = json_decode((file_get_contents($url, false, $context)), true);

      // //Validacion del resultado
      if ($result["sms"]["1"]["resultado_t"]=="No tiene saldo disponible") {//Validar que tenga saldo disponible para enviar
        \Flash::error('No tienes saldo disponible para enviar este SMS')->important();
        return redirect('/perfiles');
      } elseif ($result["sms"]["1"]["resultado"]===1) {//Validar si hay un error en el envio (resultado = 1)
        \Flash::error('Ha ocurrido un error al enviar este SMS')->important();
        return redirect('/perfiles');
      }else{//El mesaje se envio correctamente
        //Convertir la fecha en formato Carbon
        $fechaCarbon = Carbon::parse($request->fecha_notificacion);
        $fechaCarbon->toDateString();
        //Validar la frecuencia para actualizar la fecha de notificacion
        if($request->frecuencia_compra == 'diaria'){
          $fechaCarbon->addDays(1);
        }elseif ($request->frecuencia_compra == 'semanal') {
          $fechaCarbon->addDays(7);
        }elseif ($request->frecuencia_compra == 'quincenal') {
          $fechaCarbon->addDays(15);
        }else{
            $fechaCarbon->addDays(30);
        }
        //Instanciar Alimentacion
        $alimentacion = Alimentacion::find($request->id_alimentacion);
        $alimentacion->fecha_notificacion = $fechaCarbon;
        //Actualiza la fecha de compra
        $alimentacion->save();
        \Flash::success('¡El Mensaje se ha enviado exitosamente!')->important();//Enviar Notificacion
        return redirect('/perfiles');//Redireccina a la URI
      }
    }

    /**
     * Envia peticion para consultar saldo de SMS
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function consultarSaldo()
    {

      $url = 'https://api.hablame.co/saldo/consulta/index.php';
      $data = array(
      	'cliente' => 10011523, //Numero de cliente
      	'api' => '64Afo8L6xuffckNUS0O6AQb0G7r6ho', //Clave API suministrada
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
      //Guardar los resultados del objeto JSON recibido por la plataforma
      $cliente = $result['cliente'];
      $estadoCuenta = $result['bloqueo'];
      $saldo = number_format($result["saldo"],2,',','.');
      $credito = number_format($result["credito"],2,',','.');
      //Retornar vista con las variables
      $admin = auth('admins')->user()->nombres;
      return view('admin.saldo', compact('admin', 'cliente','estadoCuenta', 'saldo', 'credito'));
    }
}
