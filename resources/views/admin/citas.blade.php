@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Citas</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Citas</li>
		</ol>
	</div>
	<div class="col-md-7 col-4 align-self-center">
		<div class="d-flex m-t-10 justify-content-end">
			<div class="d-flex m-r-20 m-l-10 hidden-md-down">
				<div class="chart-text m-r-10">
					<h6 class="m-b-0"><small>CITAS HOY</small></h6>
					<h4 class="m-t-0 text-info">{{$citasHoy}}</h4>
				</div>
			</div>
			<div class="d-flex m-r-20 m-l-10 hidden-md-down">
				<div class="chart-text m-r-10">
					<h6 class="m-b-0"><small>TOTAL CITAS</small></h6>
					<h4 class="m-t-0 text-primary">{{$totalCitas}}</h4>
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
@foreach($citas as $cita)
<!-- .col -->
@if($cita->estado == 'Nuevo')
	<div class="col-xs-6 col-md-9 col-lg-6 col-xlg-4 ">
@else
	<div class="col-md-9 col-lg-6 col-xlg-4" style="display: none;">
@endif
		<div class="card card-body">
			<div class="row">
				 @if($cita->estado == 'Nuevo')
				 <div class="ribbon ribbon-bookmark ribbon-danger ribbon-right ">Nuevo</div>
				 @endif
				<div class="col-md-4 col-lg-3 text-center">
					<a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$cita->id_mascota}}" aria-expanded="false" aria-controls="collapseTwo"><img src="{{ Storage::url($cita->foto_mascota) }}" alt="user" class="img-circle img-responsive"></a>
				</div>
				<div class="col-md-8 col-lg-9">
					<h3 class="box-title m-b-0">{{$cita->nombre_mascota}}</h3> <small>{{$cita->raza}}</small>
					<address>
						{{$cita->motivo}} <span class="label label-light-info">Síntomas desde: </span>{{$cita->fecha_sintomas}}
						<br/>
						<br/>
						<abbr class="badge badge-info">FECHA</abbr> {{$cita->fecha_cita}}
						<abbr class="badge badge-warning" style="margin-left: 15px;">HORA</abbr> {{$cita->hora_cita}}
						@if($cita->estado == 'Nuevo')
						{!! Form::open(['route' => ['citas-update', $cita->id_cita], 'method' => 'POST', 'style' => 'display:inline;']) !!}
							<input type="text" value="Revisado" name="estado" style="display: none;">
							<button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip" data-original-title="Archivar" style="margin-left: 15px;"><i class="fa fa-inbox"></i> </button>
						{!! Form::close() !!}
						@else
						<button type="button" class="btn btn-success btn-circle" style="margin-left: 15px;"><i class="fa fa-check"></i> </button>
						@endif
					</address>
				</div>
			</div>
			<div class="card" style="margin-bottom: 0px;border: none;">
				<div class="card-header" role="tab" id="headingTwo" style="display: none">
					<h5 class="mb-0">

					</h5>
				</div>
				<div id="collapse{{$cita->id_mascota}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="card-body p-t-0">
						<div class="p-l-30 row">
							<dl class="dl-horizontal" style="width: 50%;">
								<dt>ID de Mascota</dt>
								<dd>{{$cita->mascota_id}}</dd>
							</dl>
							<dl class="dl-horizontal" style="width: 50%;">
								<dt>ID Dueño</dt>
								<dd>{{$cita->numero_documento}}</dd>
							</dl>
							<dl class="dl-horizontal" style="width: 50%;">
								<dt>Nombre Dueño</dt>
								<dd>{{$cita->nombres}}</dd>
							</dl>
							<dl class="dl-horizontal" style="width: 50%;">
								<dt>Fecha de Síntomas</dt>
								<dd>{{$cita->fecha_sintomas}}</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col -->
@endforeach
</div>
@endsection
