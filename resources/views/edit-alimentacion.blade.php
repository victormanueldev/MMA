@extends('layouts.indexUser')
@section('content')
<div id="content" class="container-fluid">
	<div class="col-lg-6" style="padding-top: 15px;">
          @if(count($errors) > 0)
             @foreach ($errors->all() as $error)
               <div class="alert alert-danger">{{$error}}</div>
             @endforeach
           @endif
  </div>
     <div class="col-lg-6" style="padding-top: 15px;">
     	<div class="card">
     		<header class="card-heading">
				<h2 class="card-title">Perfil de Compras</h2>
			</header>
			<div class="card-body">
				<p>Mundo Mascotas App &copy; enviará notificaciones por SMS para informarle la disponibilidad del producto con el que alimenta a su(s) mascota(s).</p>
        @foreach($alimentacion as $perfil)
				{!! Form::open(['route' => ['update-alimentacion', $perfil->id], 'method' => 'POST']) !!}
				{{ csrf_field() }}
				<!-- Tipo de Alimento -->
				<div class="form-group">
					<select class="form-control select" name="tipo_alimento">
						<option value="{{$perfil->tipo_alimento}}">{{$perfil->tipo_alimento}}</option>
						<option value="Seco">Seco</option>
						<option value="Semi-Humedo">Semi-Húmedo</option>
						<option value="Humedo">Húmedo</option>
						<option value="Enlatado">Enlatado</option>
						<option value="Mixto">Mixto</option>
					</select>
				</div>
				<!-- Marca -->
				<div class="form-group">
					<label class="form-control-label" for="inputInlineUsername">Marca Preferida: </label>
					<input type="text" class="form-control" id="inputInlineUsername" name="marca"
					autocomplete="off"  value="{{$perfil->marca}}"/>
				</div>
				<!-- Ultima Compra -->
				<div class="form-group is-empty">
					<label for="datepicker-theme" class="control-label">Fecha de su última compra:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<input type="text" class="form-control datepicker" id="datepicker-theme" type="date" name="ultima_compra" value="{{$perfil->ultima_compra}}">
					</div>
				</div>
				<!-- frecuencia de compra -->
				<div class="form-group">
					<select class="form-control select" name="frecuencia_compra">
						<option value="{{$perfil->frecuencia_compra}}">{{$perfil->frecuencia_compra}}</option>
						<option value="diaria">Diariamente</option>
						<option value="semanal">Cada 7 días</option>
						<option value="quincenal">Cada 15 días</option>
						<option value="mensual">Mensualmente</option>
					</select>
				</div>
				<!-- cantidad de compra -->
				<div class="form-group">
					<select class="form-control select" name="cantidad_compra">
						<option value="{{$perfil->cantidad_compra}}">{{$perfil->cantidad_compra}}</option>
						<option value="500 gr">500 gr.</option>
						<option value="1 Kg">1 Kg.</option>
						<option value="5 Kg">5 Kg.</option>
						<option value="mas de 5 Kg">Más de 5 Kg.</option>
					</select>
				</div>
				<!-- ID Mascota -->
				<input type="text" value="{{$perfil->id_user}}" style="display: none;" name="id_user">

				<button type="submit" class="btn  btn-success btn-md btn-block">Enviar</button>
        @endforeach
				{!! Form::close() !!}
			</div>
     	</div>
     </div>
 </div>
@endsection
