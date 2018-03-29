@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Notificaciones Masivas</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Notificaciones</li>
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
    <div class="col-12">
        <div class="card m-b-0">
            <!-- .chat-row -->
            <div class="chat-main-box">
                <!-- .chat-left-panel -->
                <div class="chat-left-aside">
                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                    <div class="chat-left-inner">
                        <div class="form-material">
                            <input class="form-control p-20" type="text" placeholder="Listado de Clientes" disabled="">
                        </div>
                        <ul class="chatonline style-none ">
                          @foreach($users as $user)
                          <li>
                              <a href="javascript:void(0)"><img src="{{ Storage::url($user->foto) }}" alt="user-img" class="img-circle ing-responsive" style="height: 40px;width: 40px"> <span>{{$user->nombres}} <small class="text-success">{{$user->telefono_movil}}</small></span></a>
                          </li>
                          @endforeach
                          <li class="p-20"></li>
                        </ul>
                    </div>
                </div>
                <!-- .chat-left-panel -->
                <!-- .chat-right-panel -->
                <div class="chat-right-aside">
                    <div class="chat-main-header">
                        <div class="p-20 b-b">
                            <h3 class="box-title">SMS Masivos</h3>
                        </div>
                    </div>
                    <div class="chat-rbox">
                        <ul class="chat-list p-20">
                            <!--chat Row -->
                            <li style="margin-top: 0px;">
                                <div class="chat-img"><img src="assets/images/users/admin.png" alt="user" /></div>
                                <div class="chat-content">
                                    <h5>Administrador</h5>
                                    <div class="box bg-light-info">Aquí podrá enviar mensajes de texto SMS masivos para todos los clientes registrados en MMA <i class="mdi mdi-copyright"></i></div>
                                    <div class="box bg-light-info"><span class="label label-light-info">NOTA:</span> Recuerde que si su mensaje supera los 160 caracteres, cada SMS enviado, se cobrará doble</div>
                                </div>
                            </li>
                            <!--chat Row -->
                        </ul>
                    </div>
                    <div class="card-body b-t">
                        <div class="row">
                            <div class="col-8">
                               {!! Form::open(['route' => ['sms-masivo'], 'method' => 'POST']) !!}
                                <textarea placeholder="Escriba su mensaje aquí" class="form-control b-0" name="sms"></textarea>
                            </div>
                            <div class="col-4 text-right">
                                <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-paper-plane-o"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .chat-right-panel -->
            </div>
            <!-- /.chat-row -->
            <!-- sample modal content -->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="mySmallModalLabel">Confirmación de Envío</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">¿Está seguro que desea enviar el SMS Masivo a {{$contUsers}} Usuaios?

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect btn-md" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light btn-md">Sí</button>
                        </div>
                           {!! Form::close() !!}

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('js/chat.js')}}"></script>
@endsection
