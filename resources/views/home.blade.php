@extends('layouts.indexUser')
@section('content')
<div id="header_wrapper" class="header-xl custom profile-header">
	<ul class="card-actions fab-action right">
		<li>
			<button class="btn btn-primary btn-fab" data-toggle="modal" data-target="#newContactModal">
				<i class="zmdi zmdi-plus"></i>
			</button>
		</li>
	</ul>
</div>
<div id="content" class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="card card-transparent">
				<div class="card-body wrapper">
					<div class="row">
						<div class="col-md-12 col-lg-3">
							<div class="card type--profile">
								<header class="card-heading">
									<img src="{{ Storage::url(Auth::user()->foto) }}" alt="" class="img-circle">
									<ul class="card-actions icons right-top">
										<li class="dropdown">
											<a href="javascript:void(0)" data-toggle="dropdown">
												<i class="zmdi zmdi-more-vert"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right btn-primary">
												<li>
													<a href="{{route('edit-profile.edit',Auth::user()->id)}}">Editar Perfil</a>
												</li>
											</ul>
										</li>
									</ul>
								</header>

								<div class="card-body">
									<h3 class="name">{{ Auth::user()->nombres }}</h3>
									<span class="title">{{ Auth::user()->apellidos }}</span>
									 <button type="button" class="btn btn-primary btn-round" >Usuario</button>
								</div>
								 <footer class="card-footer border-top">
									<div class="row row p-t-10 p-b-10">
										<div class="col-xs-4"><span class="count">{{ $contadorMascotas }}</span><span>Mascotas</span></div> <!--PENDIENTE-->
										<div class="col-xs-4"><span class="count">{{ $contadorCitas }}</span><span>Citas</span></div> <!--PENDIENTE-->
										<div class="col-xs-4"><span class="count">{{ $contadorPeluqueria }}</span><span>Peluqueria</span></div> <!--PENDIENTE-->
									</div>
								</footer>
							</div>
						</div>
						<div class="col-lg-6" style="padding-top: 15px;">
			           @if(count($errors) > 0)
			              @foreach ($errors->all() as $error)
			                <div class="alert alert-danger">{{$error}}</div>
			              @endforeach
			            @endif
			      </div>
						<div class="col-md-12 col-lg-8">
							<div class="card">
								<header class="card-heading p-0">
									<div class="tabpanel m-b-30">
										<ul class="nav nav-tabs nav-justified">
											<li class="active " role="presentation"><a href="#profile-contacts" data-toggle="tab" aria-expanded="true">Mascotas</a></li>
											<li role="presentation"><a href="#profile-about" data-toggle="tab" aria-expanded="true">Perfil</a></li>

										</ul>
									</div>
								</header>
									<div class="card-body">
										<div class="tab-content">
													<!-- Panel Perfil -->
													<div class="tab-pane fadeIn" id="profile-about">
														<div class="card card-transparent m-b-0">
															<header class="card-heading">
																<h2 class="card-title m-t-0">Información Báscia</h2>
															</header>
															<div class="card-body p-t-0">
																<div class="p-l-30">
																	<dl class="dl-horizontal">
																		<dt>Identificación</dt>
																		<dd>{{Auth::user()->numero_documento}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Nombres</dt>
																		<dd>{{Auth::user()->nombres}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Apellidos</dt>
																		<dd>{{Auth::user()->apellidos}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Fecha de Nacimiento</dt>
																		<dd>{{Auth::user()->fecha_nacimiento}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Género</dt>
																		<dd>{{Auth::user()->genero}}</dd>
																	</dl>

																</div>
															</div>
														</div>
														<div class="card card-transparent">
															<header class="card-heading">
																<h2 class="card-title">Información de Residencia</h2>
															</header>
															<div class="card-body p-t-0">
																<div class="p-l-30">
																	<dl class="dl-horizontal">
																		<dt>Barrio</dt>
																		<dd>{{Auth::user()->barrio}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Dirección</dt>
																		<dd>{{Auth::user()->direccion}}</dd>
																	</dl>

																	<dl class="dl-horizontal">
																		<dt>Ciudad</dt>
																		<dd>Cali, Valle (CO)</dd>
																	</dl>
																</div>
															</div>
														</div>
														<div class="card card-transparent">
															<header class="card-heading">
																<h2 class="card-title">Contacto</h2>
															</header>
															<div class="card-body p-t-0">
																<div class="p-l-30">
																	<dl class="dl-horizontal">
																		<dt>Teléfono Fijo</dt>
																		<dd>{{Auth::user()->telefono_fijo}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Teléfono Móvil</dt>
																		<dd>{{Auth::user()->telefono_movil}}</dd>
																	</dl>
																	<dl class="dl-horizontal">
																		<dt>Email</dt>
																		<dd>{{Auth::user()->email}}</dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
													<!-- Fin Panel Perfil -->
													<!-- Panel Mascotas -->

													<div class="tab-pane fadeIn active" id="profile-contacts">
														<div class="row">
															@if($contadorMascotas == 0)
															<div class="col-md-3 col-sm-4 col-xs-12">
																<div  class="card m-10" style="text-align: center;">
																	<header class="card-heading">
																	<h2 class="card-title">¡Todavía no hay mascotas!</h2>
																	</header>
																	<div class="card-body">
																		<p>Toca el botón <strong>+</i></strong> para agregar una mascota</p>
																	</div>
																</div>
															</div>
															@else
															<!--Recorrer el Array que contiene las mascotas del usuario-->
															@foreach($mascotas as $mascota)
															<!--Validar que el Usuario tenga mascotas registradas-->
															@if($mascota->tipo_mascota == ''){
																<h3>Aún no tienes una mascota, ¡Agrega una!</h3>
																<a href="#">Agregar Mascota</a>
															}
															@else
															<!--Mostrar las Mascotas del Usuario-->
															<div class="col-md-3 col-sm-4 col-xs-12">
																<div  class="card type--profile m-10">
																	<header class="card-heading  card-blue">
																		<img src="{{ Storage::url($mascota->foto_mascota) }}" alt="" class="img-circle profile-mini">
																		<ul class="card-actions icons right-top">
																			<li class="dropdown">
																				<a href="javascript:void(0)" data-toggle="dropdown">
																					<i class="zmdi zmdi-more-vert"></i>
																				</a>
																				<ul class="dropdown-menu dropdown-menu-right btn-info">
																					<li>
																						<a href="{{ route('edit-pet.edit', $mascota->id) }}"><i class="zmdi zmdi-edit"></i> <span class="m-l-10">Editar Mascota</span></a>
																					</li>
																					</ul>
																				</li>
																			</ul>
																		</header>
																		<div class="card-body">

																			<h3 class="name">{{ $mascota->nombre_mascota }}</h3>

																			<span class="title">{{$mascota->raza}}</span>
																			<a  href="{{route('create-cita', $mascota->id)}}" class="btn btn-primary btn-sm btn-round" >Agendar Cita</a>
																			<!-- <a  href="#" class="btn btn-blue btn-round  btn-sm">Agendar </a> -->

																		</div>
																		<div class="card-footer border-top">
																			<ul class="card-actions left-bottom">
																				<li>
																					<a href="{{route('vacunas-show', $mascota->id)}}"class="btn btn-default btn-flat">
																						Vacunación
																					</a>
																				</li>
																			</ul>
																			<ul class="card-actions icons right-bottom">
																				<li>
																					<a href="{{ route('edit-pet.edit', $mascota->id) }}">
																						<i class="zmdi zmdi-edit"></i>
																					</a>
																				</li>
																				<li>
																					<a href="{{ route('edit-pet.show', $mascota->id) }}">
																						<i class="zmdi zmdi-eye"></i>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
																@endif
																@endforeach
																@endif
															</div>
														</div>
														<!-- fin Panel Mascotas -->
													</div>
												</div>
											</div>
										</div>
										<!-- Perfil de Alimentacion -->
										<div class="col-lg-4">
											<div class="card">
												<header class="card-heading">
													<h2 class="card-title">Perfil de compras</h2>
													<ul class="card-actions icons right-top">
														<li class="dropdown">
															<a href="javascript:void(0)" data-toggle="dropdown">
																<i class="zmdi zmdi-more-vert"></i>
															</a>
															<ul class="dropdown-menu dropdown-menu-right btn-info">
																<li>
																	<a href="{{route('edit-alimentacion', Auth::user()->id)}}"><i class="zmdi zmdi-edit"></i> <span class="m-l-10">Editar</span></a>
																</li>
																</ul>
															</li>
														</ul>
												</header>
												<div class="card-body">
													<p>Para Mundo Mascotas nuestros clientes también son importantes, por esto, cuétanos cómo alimentas a tu mascota y así podremos brindarte un servicio más personalizado.</p>
													@if($alimentacion == 1)
													<a type="button" class="btn btn-success btn-round btn-block" disabled="">Información Enviada</a>
													@else
													<a type="button" href="{{ route('alimentacion',Auth::user()->id) }}" class="btn btn-primary	btn-round btn-block">Enviar información</a>
													@endif
												</div>
											</div>
										</div>
										<!-- Fin Perfil de Alimentacion -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection
