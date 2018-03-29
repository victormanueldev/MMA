@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Perfil de Mascota</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Perfil Mascota</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
@foreach($mascota as $mascota)
<!-- Row -->
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
          <div class="card-body">
              <center class="m-t-30"> <img src="{{Storage::url($mascota->foto_mascota)}}" class="img-circle img-responsive" style="width: 190px;height: 190px;" />
                  <h4 class="card-title m-t-10">{{$mascota->nombre_mascota}}</h4>
                  <h6 class="card-subtitle" style="margin-bottom: 2px;">{{$mascota->raza}}</h6>
                  <h6 class="link label label-light-info">{{$mascota->nombres}}</h6>
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
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Dueño</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Vacunación</a> </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane" id="home" role="tabpanel">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2"> <img src="{{Storage::url($mascota->foto)}}" style="width: 90px;" class="img-circle img-responsive thumbnail m-r-15"> </div>
                      <div class="col-md-4 b-r">
                        <dl class="dl-horizontal" style="margin-top: 5px;">
                          <dt>{{$mascota->nombres}}</dt>
                          <dd style="margin-bottom: 0;">{{$mascota->numero_documento}}</dd>
                          <dd>{{$mascota->telefono_movil}}</dd>
                        </dl>
                      </div>
                  </div>
                  </div>
              </div>
              <!--second tab-->
              <div class="tab-pane active" id="profile" role="tabpanel">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Identificación</strong>
                              <br>
                              <p class="text-muted">{{$mascota->id}}</p>
                          </div>
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Tipo de Mascota</strong>
                              <br>
                              <p class="text-muted">{{$mascota->tipo_mascota}}</p>
                          </div>
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Sexo</strong>
                              <br>
                              <p class="text-muted">{{$mascota->sexo_mascota}}</p>
                          </div>
                          <div class="col-md-3 col-xs-6"> <strong>Fecha Nacimiento</strong>
                              <br>
                              <p class="text-muted">{{$mascota->fecha_nacimiento_mascota}}</p>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Color</strong>
                              <br>
                              <p class="text-muted">{{$mascota->color}}</p>
                          </div>
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Peso</strong>
                              <br>
                              <p class="text-muted">{{$mascota->peso}} Kg.</p>
                          </div>
                          <div class="col-md-3 col-xs-6 b-r"> <strong>Tamaño</strong>
                              <br>
                              <p class="text-muted">{{$mascota->tamano}}</p>
                          </div>
                          <div class="col-md-3 col-xs-6"> <strong>Esterilizado</strong>
                              <br>
                              <p class="text-muted">{{$mascota->esterilizado}}</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
										<button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Aplicar Vacuna</button>
										<div class="row">
											@foreach($perfilVacunacion as $vacuna)
											<div class="col-md-2"> <img src="{{Storage::url($vacuna->etiqueta)}}" style="width: 60px;" class="img-circle img-responsive thumbnail m-r-15"> </div>
											<div class="col-md-4 b-r">
												<dl class="dl-horizontal" style="margin-top: 5px;">
													<dt>{{$vacuna->nombre_vacuna}}</dt>
													<dd style="margin-bottom: 0;">{{$vacuna->fecha_aplicacion}}</dd>
											</div>
											@endforeach
										</div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!-- Column -->
		<!-- .modal for add task -->
	 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			 <div class="modal-dialog" role="document">
					 <div class="modal-content">
							 <div class="modal-header">
									 <h4 class="modal-title">Añadir Vacuna</h4>
									 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
							 </div>
							 <div class="modal-body">
								 {!! Form::open(['route' => ['perfilVacuna-store'], 'method' => 'POST']) !!}
								 {{ csrf_field() }}
											 <div class="form-group">
													 <label>Nombre de Vacuna</label>
													 <select class="custom-select form-control pull-right" name="id_vacuna">
														 <option value="1">Puppy</option>
														 <option value="2">Quintuple</option>
														 <option value="3">Sextuple</option>
														 <option value="4">KC</option>
														 <option value="7">Vacuna Anual Perros</option>
														 <option value="5">Triple Viral</option>
														 <option value="6">Leucemia</option>
														 <option value="9">Rabia (Gatos)</option>
														 <option value="8">Vacuna Anual Gatos</option>
													 </select>
											 </div>
											 <div class="form-group">
													 <label>Fecha de Aplicación</label>
													 <input type="text" class="form-control" value="{{ $hoy }}" name="fecha_aplicacion">
												</div>

												<input type="hidden" name="id_mascota" value="{{$mascota->id}}">

							 </div>
							 <div class="modal-footer">
									 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									 <button type="submit" class="btn btn-success">Aplicar</button>
							 </div>
							 {!! Form::close() !!}
					 </div>
					 <!-- /.modal-content -->
			 </div>
			 <!-- /.modal-dialog -->
	 </div>
	 <!-- /.modal -->
</div>
<!-- Row -->
@endforeach
@endsection
