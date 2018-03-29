@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Perfil de Cliente</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Perfil Cliente</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{Storage::url($user->foto)}}" class="img-circle img-responsive" style="width: 190px;height: 190px;" />
                    <h4 class="card-title m-t-10">{{$user->nombres}}</h4>
                    <h6 class="card-subtitle" style="margin-bottom: 2px;">{{$user->apellidos}}</h6>
                    <h6 class="link label label-light-info">{{$user->email}}</h6>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Perfil</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Mascotas</a> </li>
                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane" id="home" role="tabpanel">
                    <div class="card-body">
                      <div class="row">
                        @foreach($mascotas as $mascota)
                        <div class="col-md-2"> <img src="{{Storage::url($mascota->foto_mascota)}}" style="width: 90px;" class="img-circle img-responsive thumbnail m-r-15"> </div>
                        <div class="col-md-4 b-r">
                          <dl class="dl-horizontal" style="margin-top: 5px;">
                            <dt>{{$mascota->nombre_mascota}}</dt>
                            <dd style="margin-bottom: 0;">{{$mascota->tipo_mascota}}</dd>
                            <dd>{{$mascota->raza}}</dd>
                          </dl>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <!--second tab-->
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo Documento</strong>
                                <br>
                                <p class="text-muted">{{$user->tipo_documento}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Identificación</strong>
                                <br>
                                <p class="text-muted">{{$user->numero_documento}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Género</strong>
                                <br>
                                <p class="text-muted">{{$user->genero}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Fecha Nacimiento</strong>
                                <br>
                                <p class="text-muted">{{$user->fecha_nacimiento}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Barrio</strong>
                                <br>
                                <p class="text-muted">{{$user->barrio}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Dirección</strong>
                                <br>
                                <p class="text-muted">{{$user->direccion}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Teléfono</strong>
                                <br>
                                <p class="text-muted">{{$user->telefono_fijo}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Celular</strong>
                                <br>
                                <p class="text-muted">{{$user->telefono_movil}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
@endsection
