@extends('layouts.indexUser')
@section('content')
          <div id="content" class="container-fluid">
          		<div class="col-sm-12" style="padding-top: 15px;">
          		<div class="card">
          			<header class="card-heading"><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
          				<h2 class="card-title">Editar perfil de {{$mascota->nombre_mascota}}</h2>
          			</header>
          			<div class="card-body">
                  {!! Form::open(['route' => ['edit-pet.update', $mascota->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
                      <!-- Tipo de Mascota -->
                        <div class="form-group">
                          <select class="form-control select" name="tipo_mascota" id="expiry-month">
                            <option value="{{ $mascota->tipo_mascota }}">{{ $mascota->tipo_mascota }}</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <option value="Conejo">Conejo</option>
                          </select>
                        </div>
                        <!-- Nombres -->
                        <div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Nombres: </label>
                          <input type="text" class="form-control" id="inputInlineUsername" name="nombre_mascota"
                          value="{{ $mascota->nombre_mascota }}" autocomplete="off"  />
                        </div>
          						  <!-- Sexo de Mascota -->
                        <div class="form-group">
                          <select class="form-control select" name="sexo_mascota" id="expiry-month">
                            <option value="{{$mascota->sexo_mascota}}">{{$mascota->sexo_mascota}}</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                          </select>
                        </div>
                        <!--Fecha de Nacimiento Mascota-->
                        <div class="form-group">
                          <label>Fecha de Nacimiento (AAAA-MM-DD)</label>
                          <input type="text" class="form-control input-mask" data-mask="0000-00-00" placeholder="eg: 2014-04-01" autocomplete="off" name="fecha_nacimiento_mascota" value="{{$mascota->fecha_nacimiento_mascota}}">
                        </div>
                        <!-- Raza -->
                        <div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Raza: </label>
                          <input type="text" class="form-control" id="inputInlineUsername" name="raza"
                                   autocomplete="off"  value="{{ $mascota->raza }}"/>
                        </div>
                        <!-- Color -->
                        <div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Color: </label>
                          <input type="text" class="form-control" id="inputInlineUsername" name="color"
                                   autocomplete="off"  value="{{ $mascota->color }}"/>
                       </div>
                       <!-- Esterilizado -->
                        <div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Esterilizado: </label>
                          <select class="form-control select" name="esterilizado" id="expiry-month">
                            <option value="{{$mascota->esterilizado}}">{{$mascota->esterilizado}}</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                       <!-- Peso -->
                        <div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Peso: </label>
                          <select class="form-control select" name="peso" id="expiry-month">
                            <option value="{{$mascota->peso}}">{{$mascota->peso}} Kg.</option>
                            <option value="menos6">Menos de 6 Kg. (Pequenio)</option>
                            <option value="6a13">6 Kg. a 13 Kg. (Mediano)</option>
                            <option value="13a25">13 Kg. a 25Kg. (Grande)</option>
                            <option value="25mas">Más de 25 Kg. (Extra grande)</option>
                          </select>
                        </div>
                      <!-- Tamaño de la Mascota -->
                        <!--<div class="form-group">
                          <label class="form-control-label" for="inputInlineUsername">Tamaño: </label>
                          <select class="form-control select" name="tamano" id="expiry-month">
                            <option value="{{$mascota->tamano}}">{{$mascota->tamano}}</option>
                            <option value="pequeno">Pequeño</option>
                            <option value="mediano">Mediano</option>
                            <option value="grande">Grande</option>
                            <option value="extra">Extra grande</option>
                          </select>
                        </div>-->
          						<!-- Foto de Perfil -->
          						<div class="form-group is-empty">
                        <div class="input-group">
          								<label class="form-control-label" for="inputInlineUsername">Foto de Perfil: </label>
                          <input type="file" class="form-control" name="foto_mascota" /><!--LLeva el name="foto"-->
                          <div class="input-group">
                            <input type="text" readonly="" class="form-control" placeholder="Seleccione una Foto">
                            <span class="input-group-btn input-group-sm">
                              <button type="button" class="btn btn-info btn-fab btn-fab-sm">
                                <i class="zmdi zmdi-attachment-alt"></i>
                              </button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
                      </div>
                    {!! Form::close() !!}
          			</div>
          		</div>
          	</div>
          </div>
@endsection
