@extends('layouts.indexUser')
@section('content')
<div id="content" class="container-fluid">
  <div class="col-lg-6" style="padding-top: 15px;">
    <div class="card">
      <header class="card-heading border-bottom">
        <h2 class="card-title">Vacunación</h2>
        <small>Perfil de vacunación de <strong>{{$mascota->nombre_mascota}}</strong></small>
        <ul class="card-actions icons right-top">
          <li>
            <a href="javascript:void(0)" data-toggle="refresh">
              <i class="zmdi zmdi-refresh"></i>
            </a>
          </li>
        </ul>
      </header>
      <div class="card-body">
        <div class="list-group m-t-40" style="margin-top: 5px;">
          @foreach($perfil as $vacuna)
          <div class="list-group-item">
            <div class="row-action-primary">
              <img src="{{Storage::url($vacuna->etiqueta)}}" alt="contact person" class="img-circle circle">
            </div>
            <div class="row-content">
              <div class="least-content"><a href="javascript:void" data-toggle="tooltip" data-placement="left" title="" data-original-title="Mundo Mascotas &reg;" style="color: #21c272;"><i class="zmdi zmdi-check"></i></a></div>
              <h4 class="list-group-item-heading">{{$vacuna->nombre_vacuna}}</h4>
              <p class="list-group-item-text"><strong>Fecha: </strong>{{$vacuna->fecha_aplicacion}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="card-footer border-top" style="text-align: center;">
        <img src="{{Storage::url('FirmaVet.png')}}" alt="" style="width: 100%;height: 170px;">

			</div>
    </div>
	</div>
</div>
@endsection
