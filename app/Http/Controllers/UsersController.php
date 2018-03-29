<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use MundoMascotasApp\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Buscar usuario por su ID
        $user = User::find($id);
        //Retornar la vista de Editar Mascota        
        return view('edit-profile', compact('user'));
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
        
        $user = User::find($id);//Buscar Usuario
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->barrio = $request->barrio;
        $user->direccion = $request->direccion;
        $user->telefono_movil = $request->telefono_movil;
        $user->telefono_fijo = $request->telefono_fijo;
        //Validar que el campo File no este vacio
        if ($request->hasFile('foto')) {
            $user->foto = $request->file('foto')->store('public');
        }
               
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        //Guardar Usuario
        $user->save(); 

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
    
}
