@extends('layouts.indexUser')
@section('content')
<div id="content" class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="card card-transparent">
				<div class="card-body wrapper">
					<div class="row">
						<div class="col-md-12 col-lg-3">
							<div class="card type--profile">
								<header class="card-heading">
									<img src="{{ Storage::url($mascota->foto_mascota) }}" alt="" class="img-circle">
									<ul class="card-actions icons right-top">
										<li class="dropdown">
											<a href="javascript:void(0)" data-toggle="dropdown">
												<i class="zmdi zmdi-more-vert"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right btn-primary">
												<li>
													<a href="{{route('edit-pet.edit', $mascota->id)}}">Editar Perfil</a>
												</li>
											</ul>
										</li>
									</ul>
								</header>

								<div class="card-body">
									<h3 class="name">{{ $mascota->nombre_mascota }}</h3>
									<span class="title">{{$mascota->raza}}</span>
									<button type="button" class="btn btn-primary btn-round" >Mascota</button>
								</div>
							</div>
						</div>
					<div class="col-md-12 col-lg-3">
						<div class="card m-b-0">
							<header class="card-heading">
								<h2 class="card-title m-t-0">Información Básica</h2>
							</header>
							<div class="card-body p-t-0">
								<div class="p-l-30">
									<dl class="dl-horizontal">
										<dt>Identificación</dt>
										<dd>{{$mascota->id}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Tipo de Mascota</dt>
										<dd>{{$mascota->tipo_mascota}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Nombre Completo</dt>
										<dd>{{$mascota->nombre_mascota}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Sexo</dt>
										<dd>{{$mascota->sexo_mascota}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Fecha de Nacimiento</dt>
										<dd>{{$mascota->fecha_nacimiento_mascota}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Raza</dt>
										<dd>{{$mascota->raza}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Color</dt>
										<dd>{{$mascota->color}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Esterilizado</dt>
										<dd>{{$mascota->esterilizado}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Fecha de última vacuna</dt>
										<dd>{{$mascota->ultima_vacuna}}</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Peso</dt>
										<dd>{{$mascota->peso}}  Kg.</dd>
									</dl>
									<dl class="dl-horizontal">
										<dt>Tamaño</dt>
										<dd>{{$mascota->tamano}}</dd>
									</dl>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
