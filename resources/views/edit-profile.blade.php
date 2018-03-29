@extends('layouts.indexUser')
@section('content')
          <div id="content" class="container-fluid">
          		<div class="col-sm-12" style="padding-top: 15px;">
          		<div class="card">
          			<header class="card-heading card-blue">         				
          				<h2 class="card-title">Editar Perfil</h2>          			
          			</header>
          			<div class="card-body">
                  {!! Form::open(['route' => ['edit-profile.update', $user], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
                   
          						<!-- Nombres -->
                      <div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Nombres: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="nombres"
                        value="{{ $user->nombres }}" autocomplete="off"  />
                      </div>
          						<!-- Apellidos -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Apellidos: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="apellidos"
                        value="{{ $user->apellidos }}" autocomplete="off" />
                      </div>
          						<!-- Barrio -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Barrio: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="barrio"
                        value="{{ $user->barrio }}" autocomplete="off" />
                      </div>
          						<!-- Direccion -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Dirección: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="direccion"
                        value="{{ $user->direccion }}" autocomplete="off" />
                      </div>
          						<!-- Telefono Movil -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Teléfono Móvil: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="telefono_movil"
                        value="{{ $user->telefono_movil }}" autocomplete="off" />
                      </div>
          						<!-- Telefono Movil -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Teléfono Fijo: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="telefono_fijo"
                        value="{{ $user->telefono_fijo }}" autocomplete="off" />
                      </div>
          						<!-- Foto de Perfil -->
          						<div class="form-group is-empty">
                        <div class="input-group">
          								<label class="form-control-label" for="inputInlineUsername">Foto de Perfil: </label>
                          <input type="file" class="form-control" name="foto" /><!--LLeva el name="foto"-->
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
          						<!-- Fecha de Nacimiento -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Fecha de Nacimiento: </label>
                        <input type="text" class="form-control" id="inputInlineUsername" name="fecha_nacimiento"
                        value="{{ $user->fecha_nacimiento }}" autocomplete="off" />
                      </div>
          						<!-- Email -->
          						<div class="form-group">
                        <label class="form-control-label" for="inputInlineUsername">Email: </label>
                        <input type="email" class="form-control" id="inputInlineUsername" name="email"
                        value="{{ $user->email }}" autocomplete="off" />
                      </div>
          						<!-- Nueva Contraseña 
                      <div class="form-group">
                        <label class="form-control-label" for="inputInlinePassword">Nueva Contraseña: </label>
                        <input type="password" class="form-control" id="inputInlinePassword" name="password"
                        value="{{ $user->password }}" autocomplete="off" />
                      </div>
          						 Repita Contraseña
                      <div class="form-group">
                        <label class="form-control-label" for="inputInlinePassword">Repita la nueva contraseña: </label>
                        <input type="password" class="form-control" id="inputInlinePassword" name="password_confirmation"
                        placeholder="Repita la contraseña" autocomplete="off" />
                      </div> -->

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary ">Actualizar</button>
                      </div>                 
                    {!! Form::close() !!}
          			</div>
          		</div>
          	</div>
          </div>
@endsection
