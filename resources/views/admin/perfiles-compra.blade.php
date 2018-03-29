@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Perfiles de Comrpa</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Perfiles de Compra</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
 <div class="row">
	 <div class="col-lg-12 col-md-12" style="padding-top: 15px;">
				@if(count($errors) > 0)
					 @foreach ($errors->all() as $error)
						 <div class="alert alert-success">{{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
              </div>
					 @endforeach
					 @else
					 	@include('flash::message')
				 @endif
	 </div>
   <div class="col-md-12 col-lg-12">
     <!-- Card -->
     <div class="card">
       <div class="card-body">
         <h4 class="card-title">Perfiles de Compra</h4>
       </div>
       <!-- ============================================================== -->
       <!-- Comment widgets -->
       <!-- ============================================================== -->
       <div class="comment-widgets">
         <!-- Comment Row -->
         @foreach($perfiles as $perfil)
         <div class="d-flex flex-row comment-row">
           <div class="p-2"><span class="round" style="width: 65px;height: 65px"><img src="{{ Storage::url($perfil->foto) }}" alt="user" width="50" style="width: 65px;height: 65px;"></span></div>
           <div class="comment-text w-100 active" style="padding-top: 0px;">
             <h3>{{$perfil->nombres}} {{$perfil->apellidos}}</h3>
             <div class="row">
               <dl class="dl-horizontal" style="width: 20%;padding-left: 20px;">
                 <dt style="font-weight: 500;">Tipo de Alimento</dt>
                 <dd>{{$perfil->tipo_alimento}}</dd>
               </dl>
               <dl class="dl-horizontal" style="width: 15%;padding-right: 0px;">
                 <dt style="font-weight: 500;">Marca</dt>
                 <dd>{{$perfil->marca}}</dd>
               </dl>
               <dl class="dl-horizontal" style="width: 20%;padding-right: 0px;">
                 <dt style="font-weight: 500;">Ultima Compra</dt>
                 <dd>{{$perfil->ultima_compra}}</dd>
               </dl>
               <dl class="dl-horizontal" style="width: 20%;padding-right: 0px;">
                 <dt style="font-weight: 500;">Cantidad Compra</dt>
                 <dd>{{$perfil->cantidad_compra}}</dd>
               </dl>
               <dl class="dl-horizontal" style="width: 20%;padding-right: 0px;">
                 <dt style="font-weight: 500;">Fecha Notificación</dt>
                 @if($perfil->fecha_notificacion == $fechaActual)
                 <dd class="badge badge-danger">Hoy</dd>
                 @else
                 <dd>{{$perfil->fecha_notificacion}}</dd>
                 @endif
               </dl>
             </div>
             <div class="comment-footer">
               <span class="text-muted pull-right">Enviado: {{$perfil->created_at}}</span>
               <span class="label label-light-info">Notificar:</span>
               <span class="action-icons active">
                 <a href="#"  data-toggle="modal" data-target="#responsive-modal{{$perfil->id_user}}" style="padding-left: 0;"><i class="ti-pencil-alt"></i></a>
               </span>
             </div>
           </div>
         </div>
				 <!-- sample modal content -->
				 <div id="responsive-modal{{$perfil->id_user}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						 <div class="modal-dialog">
								 <div class="modal-content">
										 <div class="modal-header">
												 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												 <h4 class="modal-title">Notificar Cliente</h4>
										 </div>
										 <div class="modal-body">
												 {!! Form::open(['route' => ['enviar-sms'], 'method' => 'POST']) !!}
														 <div class="form-group">
																 <label for="recipient-name" class="control-label">Telefono Móvil:</label>
																 <input type="text" class="form-control" value="{{$perfil->telefono_movil}}" name="telefono_movil">
														 </div>
														 <div class="form-group">
																 <label for="message-text" class="control-label">Mensaje:</label>
																 <textarea class="form-control" id="message-text" name="sms"></textarea>
														 </div>
														 <input type="text" name="fecha_notificacion" value="{{$perfil->fecha_notificacion}}" style="Display: none;">
														 <input type="text" name="frecuencia_compra" value="{{$perfil->frecuencia_compra}}" style="Display: none;">
														 <input type="text" name="id_alimentacion" value="{{$perfil->id}}" style="Display: none;">

										 </div>
										 <div class="modal-footer">
												 <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
												 <button type="subnit" class="btn btn-danger waves-effect waves-light">Enviar</button>
										 </div>
										 {!! Form::close() !!}
								 </div>
						 </div>
				 </div>
				 <!-- /.modal -->
         @endforeach
         <!-- End row -->
       </div>
     </div>
   </div>
 </div>
@endsection
