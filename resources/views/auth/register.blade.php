@extends('layouts.loginLayout')

@section('wrapper')
<div class="login-register" style="background-image:url(assets/images/background/fondo1.jpg);overflow: visible;height: 1100px;padding: 30px 0 0 0;">
    <div class="login-box card" style="background-color: #ffffffb3;">
    <div class="card-body">
      <div class="l-block">
        <div class="lb-header" style="margin-bottom: 30px;">
          <div class="cnt-logo"><img src="assets/img/logo.png" alt="No encontrado" style="width: 100%;height: 100%;"></div>
        </div>
      </div>
      @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
      @endif
      <form class="form-horizontal form-material" id="formRegistro" action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <!-- Tipo de Ideintificacion -->
        <select class="select2" style="width: 100%" name="tipo_documento">
          <option value"">Tipo de Documento</option>
          <option value="Cedula">Cédula de Ciudadanía</option>
          <option value="Tarjeta Identidad">Tarjeta de Identidad</option>
          <option value="Cedula Extranjeria">Cédula de Exranjería</option>
        </select>
        <!-- Numero de ID -->
        <div class="form-group" style="margin-top: 20px;">
          <input type="number" class="form-control form-control-line" value="{{old('numero_documento')}}" placeholder="Numero de Identificación" name="numero_documento"required>
        </div>
        <!-- Nombres -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line"  value="{{old('nombres')}}" placeholder="Nombres" name="nombres">
        </div>
        <!-- Apellidos -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line" value="{{old('apellidos')}}" placeholder="Apellidos" name="apellidos">
        </div>
        <!-- Genero -->
        <select class="select2" style="width: 100%" name="genero">
          <option>Sexo</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
        <!-- Fecha de Nacimiento -->
        <div class="input-group" style="margin-top: 25px;margin-bottom: 25px;">
            <input type="text" class="form-control" id="datepicker-autoclose" value="{{old('fecha_nacimiento')}}" placeholder="Fecha de Nacimiento" name="fecha_nacimiento">
            <span class="input-group-addon"><i class="icon-calender"></i></span>
        </div>
        <!-- Barrio -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line" value="{{old('barrio')}}" placeholder="Barrio" name="barrio">
        </div>
        <!-- Direccion -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line"  value="{{old('direccion')}}" placeholder="Dirección" name="direccion" required>
        </div>
        <!-- Email -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line" value="{{old('email')}}" placeholder="Correo Electrónico" name="email" required>
        </div>
        <!-- Telefono Fijo -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line" value="{{old('telefono_fijo')}}" placeholder="Teléfono Fijo" name="telefono_fijo">
        </div>
        <!-- Movil -->
        <div class="form-group" >
          <input type="text" class="form-control form-control-line"  value="{{old('telefono_movil')}}" placeholder="Teléfono Móvil" name="telefono_movil" required >
        </div>
        <!-- Contraseña -->
        <div class="form-group" >
          <input id="password" type="password" class="form-control form-control-line"  value="{{old('numero_documento')}}" placeholder="Contraseña" name="password" required>
        </div>
        <!-- Repetir Contraseña -->
        <div class="form-group" >
          <input id="password-confirm" type="password" class="form-control form-control-line"  placeholder="Confirmar la Contraseña" name="password_confirmation"required>
        </div>

        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
