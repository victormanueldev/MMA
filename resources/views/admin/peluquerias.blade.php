@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Peluquerías</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Peluquerías</li>
		</ol>
	</div>
	<div class="col-md-7 col-4 align-self-center">
		<div class="d-flex m-t-10 justify-content-end">
			<div class="d-flex m-r-20 m-l-10 hidden-md-down">
				<div class="chart-text m-r-10">
					<h6 class="m-b-0"><small>TURNOS HOY</small></h6>
					<h4 class="m-t-0 text-info">{{$turnosHoy}}</h4>
				</div>
			</div>
			<div class="d-flex m-r-20 m-l-10 hidden-md-down">
				<div class="chart-text m-r-10">
					<h6 class="m-b-0"><small>TOTAL TURNOS</small></h6>
					<h4 class="m-t-0 text-primary">{{$totalPeluquerias}}</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
<div class="row">
  @foreach($peluquerias as $peluqueria)
	@if($peluqueria->estado == 'Nuevo')
  <div class="col-md-6">
	@else
	<div class="col-md-6" style="display:none;">
	@endif
      <div class="card">
          <div class="card-body p-b-0">
            <div class="row">
              <div class="ribbon ribbon-bookmark ribbon-danger ribbon-right ">Nuevo</div>
              <div class="col-md-4 col-lg-3 text-center">
                  <a href="#"><img src="{{ Storage::url($peluqueria->foto_mascota) }}" alt="user" class="img-circle img-responsive"></a>
              </div>
              <div class="col-md-8 col-lg-9">
                  <h3 class="box-title m-b-0">{{$peluqueria->nombre_mascota}}</h3> <small>{{$peluqueria->raza}}</small>
                  <address>
                      <span class="label label-light-info">Detalles de Corte: </span>{{$peluqueria->especificacion_corte}}
                      <br/>
                  </address>
              </div>
            </div>
          </div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs customtab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home{{$peluqueria->id_mascota}}" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Reserva</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile{{$peluqueria->id_mascota}}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Mascota</span></a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages{{$peluqueria->id_mascota}}" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Dueño</span></a> </li>
              <li>
								{!! Form::open(['route' => ['peluquerias-update', $peluqueria->id_peluqueria], 'method' => 'POST', 'style' => 'display:inline;']) !!}
								<input type="text" value="Revisado" name="estado" style="display: none;">
								<button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip" data-original-title="Archivar" style="margin-left: 70px;"><i class="fa fa-inbox"></i> </button>
								{!! Form::close() !!}
							</li>

          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane active" id="home{{$peluqueria->id_mascota}}" role="tabpanel">
                  <div class="p-20">
                    <div class="row">

                      <dl class="dl-horizontal" style="width: 50%;padding-left: 15px;">
                        <dt >Fecha</dt>
                        <dd>{{$peluqueria->fecha_peluqueria}}</dd>
                      </dl>
                      <dl class="dl-horizontal" style="width: 50%;padding-right: 15px;">
                        <dt >Hora</dt>
                        <dd>{{$peluqueria->hora_peluqueria}}</dd>
                      </dl>
                      <dl class="dl-horizontal" style="width: 50%;padding-left: 15px;">
                        <dt >Paquete</dt>
                        <dd>{{$peluqueria->servicio}}</dd>
                      </dl>
											<dl class="dl-horizontal" style="width: 50%;padding-right: 15px;">
                        <dt >Precio</dt>
                        <dd>$ {{$peluqueria->precio}}</dd>
                      </dl>
                    </div>
                  </div>
              </div>
              <div class="tab-pane  p-20" id="profile{{$peluqueria->id_mascota}}" role="tabpanel">
                <div class="row">
                  <dl class="dl-horizontal" style="width: 50%;padding-left: 15px;">
                    <dt >ID Mascota</dt>
                    <dd>{{$peluqueria->id_mascota}}</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 50%;padding-right: 15px;">
                    <dt >Sexo</dt>
                    <dd>{{$peluqueria->sexo_mascota}}</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 50%;padding-left: 15px;">
                    <dt >Peso</dt>
                    <dd>{{$peluqueria->peso}} Kg.</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 50%;padding-right: 15px;">
                    <dt >Tamaño</dt>
                    <dd>{{$peluqueria->tamano}}</dd>
                  </dl>
                </div>
              </div>
              <div class="tab-pane p-20" id="messages{{$peluqueria->id_mascota}}" role="tabpanel">
                <div class="row">
                  <dl class="dl-horizontal" style="width: 30%;padding-left: 15px;">
                    <dt >ID Usuario</dt>
                    <dd>{{$peluqueria->numero_documento}}</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 30%;padding-right: 15px;">
                    <dt >Nombres</dt>
                    <dd>{{$peluqueria->nombres}}</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 30%;padding-left: 15px;">
                    <dt >Teléfono</dt>
                    <dd>{{$peluqueria->telefono_fijo}}</dd>
                  </dl>
                  <dl class="dl-horizontal" style="width: 30%;padding-left: 15px;">
                    <dt >Celular</dt>
                    <dd>{{$peluqueria->telefono_movil}}</dd>
                  </dl>
									<dl class="dl-horizontal" style="width: 30%;padding-right: 15px;">
                    <dt >Dirección</dt>
                    <dd>{{$peluqueria->direccion}}</dd>
                  </dl>
									<dl class="dl-horizontal" style="width: 30%;padding-left: 15px;">
                    <dt >Barrio</dt>
                    <dd>{{$peluqueria->barrio}}</dd>
                  </dl>
                </div>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>
@endsection
