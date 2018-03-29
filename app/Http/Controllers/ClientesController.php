<?php

namespace MundoMascotasApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MundoMascotasApp\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $contadorUsers = DB::table('users')
                        ->select('users.*')
                        ->count();
        $alimentacion = DB::table('alimentacion')
                        ->select('alimentacion.*')
                        ->count();
        $admin = auth('admins')->user()->nombres;
        return view('admin.clientes', compact('users', 'alimentacion', 'contadorUsers','admin'));
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
        $user = User::find($id);
        $mascotas = DB::table('mascotas')
                            ->join('users', 'users.id', '=', 'mascotas.id_usuario')
                            ->select('mascotas.*')
                            ->where('users.id', $id)
                            ->get();
        $admin = auth('admins')->user()->nombres;
        return view('admin.perfil-cliente', compact('admin', 'user', 'mascotas'));
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
