<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use MundoMascotasApp\Http\Requests\MascotasRequest;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\Mascota;
use MundoMascotasApp\PerfilVacuna;
use Carbon\Carbon;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mascotas = DB::table('mascotas')
                    ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                    ->select('mascotas.*', 'users.nombres')
                    ->get();
        $contadorMascotas = DB::table('mascotas')
                            ->select('mascotas.*')
                            ->count();
        $admin = auth('admins')->user()->nombres;
        return view('admin.mascotas', compact('mascotas', 'contadorMascotas', 'admin'));
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
    public function store(MascotasRequest $request)
    {
        //Crear nascota
        $mascota = new Mascota();//Instanciar el Modelo Mascota
        $mascota->tipo_mascota = $request->tipo_mascota;
        $mascota->nombre_mascota = $request->nombre_mascota;
        $mascota->sexo_mascota = $request->sexo_mascota;

        //Validar que el Input File no este vacio
        if ($request->hasFile('foto_mascota')) {
            $mascota->foto_mascota = $request->file('foto_mascota')->store('public');
        }elseif ($request->tipo_mascota == 'Perro') {//Si esta vacio, agregar un valor por defecto
            $mascota->foto_mascota = 'default-pet.jpg';
        }elseif ($request->tipo_mascota == 'Gato') {
            $mascota->foto_mascota = 'default-cat.jpg';
        }elseif ($request->tipo_mascota == 'Conejo') {
            $mascota->foto_mascota = 'default-rabbit.jpg';
        }

        $mascota->fecha_nacimiento_mascota = $request->fecha_nacimiento_mascota;
        $mascota->raza = $request->raza;
        $mascota->color = $request->color;
        $mascota->peso = $request->peso;
        if($request->peso == "menos6"){
          $mascota->tamano = "pequeno";
        }elseif ($request->peso == "6a13") {
          $mascota->tamano = "mediano";
        }elseif ($request->peso == "13a25") {
          $mascota->tamano = "grande";
        }else {
          $mascota->tamano = "extra";
        }

        $mascota->esterilizado = $request->esterilizado;
        // $mascota->nombre_ultima_vacuna = $request->nombre_ultima_vacuna;
        // $mascota->ultima_vacuna = $request->ultima_vacuna;
        $mascota->id_usuario = $request->id_usuario;
        //Guardar Mascota
        $mascota->save();
        //Instanciar Carbon con la fecha de ultima_compra
        $fechaCarbon = Carbon::parse($request->ultima_vacuna);
        $fechaCarbon->toDateString();
        //Guardar datos en la tabla perfilvacunacion de la Mascota guardada
        $perfilVacuna = new PerfilVacuna();
        $perfilVacuna->id_mascota = $mascota->id;
        $perfilVacuna->id_vacuna = $request->nombre_ultima_vacuna;
        $perfilVacuna->fecha_aplicacion = $request->ultima_vacuna;
        if($request->nombre_ultima_vacuna == '4' || $request->nombre_ultima_vacuna == '9'){
            $perfilVacuna->fecha_notificacion_vacuna = $fechaCarbon->addYear();
        }elseif ($request->nombre_ultima_vacuna == '7' || $request->nombre_ultima_vacuna == '8') {
          $perfilVacuna->fecha_notificacion_vacuna = '2018-01-01';
        }elseif ($request->nombre_ultima_vacuna == '10') {
          $perfilVacuna->fecha_notificacion_vacuna = '2018-01-01';
          $perfilVacuna->fecha_aplicacion = '2018-01-01';
        }else {
          $perfilVacuna->fecha_notificacion_vacuna = $fechaCarbon->addDays(15);
        }
        //$perfilVacuna->fecha_notificacion_vacuna = $fechaCarbon->addDays(15);
        //Validar si es la primera vacuna (GATOS)
        $perfilVacuna->save();
        return redirect()->route('home');//Redireccionar al Home

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Buscar Mascota por el ID
        $mascota = Mascota::find($id);
        return view('profile-pet', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mascota)
    {
        //Buscar Mascota por el ID
        $mascota = Mascota::find($id_mascota);

        //Retorna la vista de editar mascota
        return view('edit-pet', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mascota)
    {
        //Buscar la mascota por su ID
        $mascota = Mascota::find($id_mascota);
        //Igualar todos los campos con el Request
        $mascota->tipo_mascota = $request->tipo_mascota;
        $mascota->nombre_mascota = $request->nombre_mascota;
        $mascota->sexo_mascota = $request->sexo_mascota;
        $mascota->fecha_nacimiento_mascota = $request->fecha_nacimiento_mascota;
        $mascota->raza = $request->raza;
        $mascota->color = $request->color;
        $mascota->peso = $request->peso;
        if($request->peso == "menos6"){
            $mascota->tamano = "pequeno";
        }elseif($request->peso == "6a13"){
            $mascota->tamano = "mediano";
        }elseif($request->peso == "13a25"){
           $mascota->tamano = "grande";
        }else{
            $mascota->tamano = "extra";
        }
        
        $mascota->esterilizado = $request->esterilizado;

        //Validar que el campo File no este vacio
        if($request->hasFile('foto_mascota')) {
            $mascota->foto_mascota = $request->file('foto_mascota')->store('public');
        }

        $mascota->save();//Actualizar los campos
        return redirect()->route('home');//Redireccionar al Home
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfilMascota($id)
    {
        $now = Carbon::now();
        $hoy = $now->toDateString();
        //Buscar Mascota por el ID
        $mascota = DB::table('mascotas')
                  ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                  ->select('mascotas.*', 'users.nombres', 'users.email', 'users.telefono_movil', 'users.numero_documento', 'users.foto')
                  ->where('mascotas.id', $id)
                  ->get();
        $perfilVacunacion = DB::table('perfilvacunacion')
                            ->join('mascotas', 'mascotas.id', '=', 'perfilvacunacion.id_mascota')
                            ->join('vacunas', 'vacunas.id', '=', 'perfilvacunacion.id_vacuna')
                            ->select('vacunas.nombre_vacuna', 'vacunas.etiqueta', 'perfilvacunacion.fecha_aplicacion')
                            ->where('perfilvacunacion.id_mascota', $id)
                            ->get();
        $admin = auth('admins')->user()->nombres;
        return view('admin.perfil-mascota', compact('mascota', 'admin', 'perfilVacunacion', 'hoy'));
    }
}
