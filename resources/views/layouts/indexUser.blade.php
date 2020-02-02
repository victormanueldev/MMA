<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Mundo Mascotas App</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.bundle.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/theme-a.css') }}">
</head>

<body>
	<div id="app_wrapper" class="page-profile">
		<header id="app_topnavbar-wrapper">
			<!-- Navbar -->
			<nav role="navigation" class="navbar topnavbar">
				<div class="nav-wrapper">
					<div id="logo_wrapper" class="nav navbar-nav" style="width: 250px;">

							<li class="logo-icon">
								<a href="{{ route('home') }}" style="padding: 7px 15px;">
									<div class="logo">
										<img src="{{asset('assets/img/logo/logo-icon.png')}}" alt="Logo" style="width: 240px;height: 50px;">
									</div>

								</a>
							</li>

					</div>
					<ul class="nav navbar-nav left-menu ">
						<li class="menu-icon">
							<a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
								<i class="mdi mdi-backburger"></i>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</header>
		<!-- Aside -->
		<aside id="app_sidebar-left">
			<nav id="app_main-menu-wrapper" class="scrollbar">
				<div class="sidebar-inner sidebar-push">
					<ul class="nav nav-pills nav-stacked">
						<li class="sidebar-header">Menú de Navegación</li>
						<li><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i>Inicio</a></li>
						<!-- User Profile -->
						<li class="nav-dropdown active open"><a href="#"><i class="zmdi zmdi-account"></i>Perfil</a>
							<ul class="nav-sub">
								<li>
									<a href="{{route('edit-profile.edit',Auth::user()->id)}}"><i class="zmdi zmdi-settings"></i> Editar perfil</a>
								</li>
								<li>
									<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();"><i class="zmdi zmdi-sign-in"></i> Cerrar sesión</a>
									 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											 {{ csrf_field() }}
									 </form>
								</li>
							</ul>
						</li>
						<!-- End User Profile -->
						</ul>
					</div>
				</nav>
			</aside>
			<!-- End Aside -->
			<section id="content_outer_wrapper">
				<div id="content_wrapper" class="card-overlay">
						@yield('content')
				</div>
				<footer id="footer_wrapper">
					<div class="footer-content">
							<div class="row copy-wrapper">
								<div class="col-xs-8">
									<p class="copy">&copy; Copyright <time class="year"></time> Mundo Mascotas App</p>
								</div>
								<div class="col-xs-4">
									<ul class="social">
										<li>
											<a href="javascript:void(0)"> </a>
										</li>
										<li>
											<a href="javascript:void(0)"> </a>
										</li>
										<li>
											<a href="javascript:void(0)"> </a>
										</li>
										<li>
											<a href="javascript:void(0)"> </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</section>
			</div>
			<!-- Root element of PhotoSwipe. Must have class pswp. -->
			<!-- Ventana Modal Mascotas -->
						<div class="modal fade" id="newContactModal" tabindex="-1" role="dialog" aria-labelledby="newContactModal">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<!-- Formulario de Crear Mascota -->
									{!! Form::open(['route' => ['create-mascota'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
									{{ csrf_field() }}
									<div class="modal-header">
										<ul class="card-actions icons right-top">
											<li>
												<a href="javascript:void(0)" class="text-white" data-dismiss="modal" aria-label="Close">
													<i class="zmdi zmdi-close"></i>
												</a>
											</li>
										</ul>
										<h4 class="modal-title">Nueva Mascota</h4>
										<div class="user-avatar-wrapper">
											<figure>
												<div class="icon-upload">
													<label for="file-input">
														<span class="edit-avatar">
															<div class="no-avatar app_primary_lighten_bg animated zoomIn"></div>
														</span>
													</label>
													<!--Foto Perfil Mascota-->
													<input id="file-input" type="file" name="foto_mascota">
												</div>
												<label class="form-control-label" style="color: #fff;">Toca para subir una foto de tu mascota</label>
											</figure>
										</div>
									</div>

									<div class="modal-body">
										<!-- Tipo de Mascota -->
										<div class="form-group">
											<select class="form-control select" name="tipo_mascota" id="select_tipo_mascota" onselect="cambiarOption()" size="4">
												<option>Tipo de Mascota</option>
												<option value="Perro">Perro</option>
												<option value="Gato">Gato</option>
												<option value="Conejo">Conejo</option>
											</select>
										</div>
										<!-- Nombres -->
										<div class="form-group">
											<label class="form-control-label" for="inputInlineUsername">Nombre Completo: </label>
											<input type="text" class="form-control" id="inputInlineUsername" name="nombre_mascota"
											autocomplete="off"  />
										</div>
										<!-- Sexo de Mascota -->
										<div class="form-group">
											<select class="form-control select" name="sexo_mascota" id="expiry-month">
												<option>Sexo</option>
												<option value="Macho">Macho</option>
												<option value="Hembra">Hembra</option>
											</select>
										</div>
										<!-- Fecha de Naciniento -->
										<div class="form-group is-empty">
											<label for="datepicker-theme" class="control-label">Fecha de Nacimiento:</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
												<input type="text" class="form-control datepicker" id="datepicker-theme" type="date" placeholder="Selecciona la fecha" name="fecha_nacimiento_mascota" value="{{old('fecha_nacimiento_mascota')}}">
											</div>
										</div>
										<!-- Raza -->
										<div class="form-group">
											<label class="form-control-label" for="inputInlineUsername">Raza: </label>
											<input type="text" class="form-control" id="inputInlineUsername" name="raza"
											autocomplete="off"  />
										</div>
										<!-- Color -->
										<div class="form-group">
											<label class="form-control-label" for="inputInlineUsername">Color: </label>
											<input type="text" class="form-control" id="inputInlineUsername" name="color"
											autocomplete="off"  />
										</div>
										<!--  Esterilizado -->
										<div class="form-group">
											<label for="radio" class="control-label">¿Esterilizado?:</label>
											<div class="radio block"><label><input type="radio" name="esterilizado" value="Si">Si</label></div>
											<div class="radio block"><label><input type="radio" name="esterilizado" value="No">No</label></div>
										</div>
										<!-- Nombre de la ultima vacuna -->
										<div class="form-group">
											<select class="form-control select" id="select_nombre_vacuna" name="nombre_ultima_vacuna">
													<option>Nombre de vacuna</option>
														<option value="1">Puppy</option>
														<option value="2">Quintuple</option>
														<option value="3">Sextuple</option>
														<option value="4">KC</option>
														<option value="7">Vacuna Anual</option>
														<option value="5">Triple Viral </option>
														<option value="6">Leucemia </option>
											</select>
										</div>
										<!-- Ultima Vacuna -->
										<div class="form-group">
											<label class="form-control-label" for="inputInlineUsername">Fecha de la última vacuna (AAAA-MM-DD): </label>
											<input type="text" class="form-control input-mask" data-mask="0000/00/00" id="inputInlineUsername" name="ultima_vacuna"
											autocomplete="off" placeholder="Ej: 2017/05/03" value="2018/01/01"/>
										</div>
										<!--  Peso -->
										<div class="form-group">
											<label for="radio" class="control-label">Peso:</label>
											<div class="radio block"><label><input type="radio" name="peso" value="menos6">Menos de 6 Kg. (Pequeño)</label></div>
											<div class="radio block"><label><input type="radio" name="peso" value="6a13">6 Kg. a 13 Kg. (Mediano)</label></div>
											<div class="radio block"><label><input type="radio" name="peso" value="13a25">13 Kg. a 25Kg. (Grande)</label></div>
											<div class="radio block"><label><input type="radio" name="peso" value="25mas">Más de 25 Kg. (Extra grande)</label></div>
										</div>
										<!-- Tamaño -->
										<!-- <div class="form-group">
											<select class="form-control select" name="tamano" id="expiry-month">
												<option>Tamaño</option>
												<option value="pequeno">Pequeño</option>
												<option value="mediano">Mediano</option>
												<option value="grande">Grande</option>
												<option value="extra">Extra grande</option>
											</select>
										</div> -->
										<!--  ID Uusario -->
										<input type="text" name="id_usuario" style="display: none;" value="{{ Auth::user()->id }}" />
									</div>
									<div class="modal-footer">
										<!-- Guardar Mascotas -->
										<button class="btn btn-primary btn-flat" data-dismiss="modal" aria-label="Close">Cancelar</button>
										<button type="submit" class="btn btn-primary">Agregar
										</button>
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
						<!-- Fin de Ventana Modal Mascota -->

			<script src="{{asset('assets/js/vendor.bundle.js')}}"></script>
			<script src="{{asset('assets/js/app.bundle.js')}}"></script>
			<script src="{{asset('js/app.js')}}"></script>
		</body>

		</html>
