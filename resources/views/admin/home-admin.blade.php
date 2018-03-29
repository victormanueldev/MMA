@extends('layouts.indexAdmin')
@section('css')
<link href="{{asset('assets/plugins/css-chart/css-chart.css')}}" rel="stylesheet">
@endsection
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Bienvenido</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
			<li class="breadcrumb-item active">Panel Principal</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<div class="card" style="margin-bottom: 5px;">
    		<div class="card-body" style="padding-bottom: 10px;">
    			<div class="row p-t-10 p-b-10" style="padding-bottom: 0px;padding-top: 0px;">
    				<!-- Column -->
    				<div class="col p-r-0">
    					<h1 class="font-light">{{$nuevosClientes}}</h1>
    					<h6 class="text-muted">Nuevos Clientes</h6>
    				</div>
    				<!-- Column -->
    				<div class="col text-right align-self-center">
    					<div class="css-bar m-b-0 css-bar-primary css-bar-20"><img src="{{asset('assets/img/admin/conference.png')}}" alt="" style="width: 40px;height: 40px;margin: 22px;"></div>
    				</div>
    			</div>
    		</div>
				<div class="card-footer" style="padding: 0px;">
					<a type="button" class="btn waves-effect waves-light btn-primary btn-block" href="{{route('clientes-index')}}" style="border-top-left-radius: 0.0rem;border-top-right-radius: 0.0rem;">Ver Clientes</a>
				</div>
    	</div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<div class="card" style="margin-bottom: 5px;">
    		<div class="card-body" style="padding-bottom: 10px;">
    			<div class="row p-t-10 p-b-10" style="padding-bottom: 0px;padding-top: 0px;">
    				<!-- Column -->
    				<div class="col p-r-0">
    					<h1 class="font-light">{{$nuevasMascotas}}</h1>
    					<h6 class="text-muted">Nuevas Mascotas</h6>
    				</div>
    				<!-- Column -->
    				<div class="col text-right align-self-center" style="padding-left: 0px;">
    					<div class="css-bar m-b-0 css-bar-success css-bar-30"><img src="{{asset('assets/img/admin/pug.png')}}" alt="" style="width: 40px;height: 40px;margin: 22px;"></div>
    				</div>
    			</div>
					</div>
					<div class="card-footer" style="padding: 0px;">
						<a type="button" class="btn waves-effect waves-light btn-success btn-block " href="{{route('mascotas-index')}}" style="border-top-left-radius: 0.0rem;border-top-right-radius: 0.0rem;">Ver Mascotas</a>
					</div>
    	</div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<div class="card" style="margin-bottom: 5px;">
    		<div class="card-body" style="padding-bottom: 10px;">
    			<div class="row p-t-10 p-b-10" style="padding-bottom: 0px;padding-top: 0px;">
    				<!-- Column -->
    				<div class="col p-r-0">
    					<h1 class="font-light">{{$citasHoy}}</h1>
    					<h6 class="text-muted">Citas Hoy</h6>
    				</div>
    				<!-- Column -->
    				<div class="col text-right align-self-center">
    					<div class="css-bar m-b-0 css-bar-warning css-bar-40"><img src="{{asset('assets/img/admin/petcare.png')}}" alt="" style="width: 40px;height: 40px;margin: 22px;"></div>
    				</div>
    			</div>
    		</div>
				<div class="card-footer" style="padding: 0px;">
					<a type="button" class="btn waves-effect waves-light btn-warning btn-block " href="{{route('citas-index')}}" style="border-top-left-radius: 0.0rem;border-top-right-radius: 0.0rem;">Ver Citas</a>
				</div>
    	</div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
    	<div class="card" style="margin-bottom: 5px;">
    		<div class="card-body" style="padding-bottom: 10px;">
    			<div class="row p-t-10 p-b-10" style="padding-bottom: 0px;padding-top: 0px;">
    				<!-- Column -->
    				<div class="col p-r-0">
    					<h1 class="font-light">{{$turnosHoy}}</h1>
    					<h6 class="text-muted">Turnos Hoy</h6>
    				</div>
    				<!-- Column -->
    				<div class="col text-right align-self-center" style="padding-left: 0px;">
    					<div class="css-bar m-b-0 css-bar-info css-bar-60"><img src="{{asset('assets/img/admin/barbershop.png')}}" alt="" style="width: 40px;height: 40px;margin: 22px;"></div>
    				</div>
    			</div>
				</div>
				<div class="card-footer" style="padding: 0px;">
					<a type="button" class="btn waves-effect waves-light btn-info btn-block " href="{{route('peluquerias-index')}}" style="border-top-left-radius: 0.0rem;border-top-right-radius: 0.0rem;">Ver Peluquerías</a>
				</div>
    	</div>
    </div>
</div>
<div class="row" style="margin-top: 25px;">
	<!-- Column -->
	<div class="col-lg-3 col-md-6">
			<div class="card">
					<div class="d-flex flex-row">
							<div class="p-10 bg-primary">
									<h3 class="text-white box m-b-0" style="font-size: 25px;"><i class="mdi mdi-account-plus"></i></h3></div>
							<div class="align-self-center m-l-20">
									<h3 class="m-b-0 text-purple">{{$totalClientes}}</h3>
									<h6 class="text-muted m-b-0">Total Clientes</h6>
							</div>
					</div>
			</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="col-lg-3 col-md-6">
			<div class="card">
					<div class="d-flex flex-row">
							<div class="p-10 bg-success">
									<h3 class="text-white box m-b-0" style="font-size: 25px;"><i class="mdi mdi-paw"></i></h3></div>
							<div class="align-self-center m-l-20">
									<h3 class="m-b-0 text-success">{{$totalMascotas}}</h3>
									<h6 class="text-muted m-b-0">Total Mascotas</h6>
							</div>
					</div>
			</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="col-lg-3 col-md-6">
			<div class="card">
					<div class="d-flex flex-row">
							<a href="{{route('citas-all')}}"><div class="p-10 bg-warning">
									<h3 class="text-white box m-b-0" style="font-size: 25px;"><i class="mdi mdi-stethoscope"></i></h3>
							</div></a>
							<div class="align-self-center m-l-20">
									<h3 class="m-b-0 text-warning">{{$totalCitas}}</h3>
									<h6 class="text-muted m-b-0">Total Citas</h6>
							</div>
					</div>
			</div>
	</div>
	<!-- Column -->
	<!-- Column -->
	<div class="col-lg-3 col-md-6">
			<div class="card">
					<div class="d-flex flex-row">
							<a href="{{route('peluquerias-all')}}"><div class="p-10 bg-info">
									<h3 class="text-white box m-b-0" style="font-size: 25px;"><i class="mdi mdi-content-cut"></i></h3>
							</div></a>
							<div class="align-self-center m-l-20">
									<h3 class="m-b-0 text-primary">{{$totalPeluquerias}}</h3>
									<h6 class="text-muted m-b-0">Total Turnos</h6>
							</div>
					</div>
			</div>
	</div>
	<!-- Column -->
</div>
<!-- Row -->
<div class="row">
	<div class="col-md-12 col-lg-12">
			<div class="card">
					<div class="card-body p-b-0">
							<h4 class="card-title">Fidelización de Clientes</h4>
							<h6 class="card-subtitle">Navega por este menú para enviar SMS a los clientes de Mundo Mascotas</h6>
							<!-- Nav tabs -->
							<ul class="nav nav-tabs customtab2" role="tablist">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" ><span class="hidden-sm-up" ><i class="fa fa-users"></i></span> <span class="hidden-xs-down">Perfiles de Compras</span></a> </li>
									<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" ><span class="hidden-sm-up" ><i class="fa fa-bullhorn"></i></span> <span class="hidden-xs-down">Notificaciones Masivas</span></a> </li>
									<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" ><span class="hidden-sm-up" ><i class="fa fa-bell"></i></span> <span class="hidden-xs-down">Notificaciones de Vacunas</span></a> </li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
									<div class="tab-pane active" id="home7" role="tabpanel">
											<div class="p-20">
													<h4>Perfiles Enviados: {{$totalAlimentiacion}}</h4>
													<p>Envia SMS para notificar a los clientes.</p>
													<a href="{{route('perfiles-index')}}" class="btn btn-info">Enviar SMS</a>
											</div>
									</div>
									<div class="tab-pane  p-20" id="profile7" role="tabpanel">
										<h4>Total Clientes: {{$totalClientes}}</h4>
										<p>Envia SMS a todos los clientes.</p>
										<a href="{{route('notificaciones-masivas')}}" class="btn btn-warning">Enviar SMS</a>
									</div>
									<div class="tab-pane p-20" id="messages7" role="tabpanel">
										<h4> Notificaciones Hoy: {{$notificacionVacunas}}</h4>
										<p>Envia SMS para notificar sobre las vacunas de sus mascotas.</p>
										<a href="{{route('notificacion-vacunas')}}" class="btn btn-success">Enviar SMS</a>
									</div>
							</div>
					</div>
			</div>
	</div>
</div>
@endsection
