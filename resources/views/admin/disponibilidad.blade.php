@extends('layouts.indexAdmin')
@section('css')
<link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text -themecolor m-b-0 m-t-0">Disponibilidad de Citas</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Disponibilidad de Citas</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
<div class="col-lg-12" style="padding-top: 15px;padding-left: 0;">
	@if(count($errors) > 0)
	   @foreach ($errors->all() as $error)
		 <div class="alert alert-danger">{{$error}}</div>
	   @endforeach
	   @else
		 @include('flash::message')
	 @endif
  </div>
<!-- Card -->
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['route' => ['disp-sotre'], 'method' => 'POST']) !!}
				{{ csrf_field() }}
				<div class="example">
					<h5 class="box-title m-t-30">Disponibilidad de Citas Médicas</h5>
					<p class="text-muted m-b-20">A través de este formulario, puedes informarle a los usuarios, que no se podrán agendar citas médico-veterinarias. Por favor, seleccione los intervalos de fechas o jornadas en los que no habrá disponibilidad de citas</p>
					<!--Intervalo de fechas-->
					<label for="">Seleccione la fecha de inicio y la fecha de fin:</label><br>
					<div class="input-daterange input-group" id="date-range">
						<input type="text" class="form-control" name="fecha_inicio" required="" />
						<div class="input-group-append">
							<span class="input-group-text bg-info b-0 text-white">HASTA</span>
						</div>
						<input type="text" class="form-control" name="fecha_fin" required="" />
					</div>

					<!-- Jornada -->
					<div class="input-group" style="margin-top: 15px;">
						<label for="">Selecciona la jornada:</label>
						<select class="select2" style="width: 100%" name="jornada" required="">
							<option value="Mañana y Tarde">Mañana y Tarde</option>
							<option value="Manana">Mañana</option>
							<option value="Tarde">Tarde</option>
						</select>
					</div>

					<!-- Motivo -->
			        <div class="form-group" style="margin-top: 15px;">
			        	<label>Motivo</label>
			        	<input type="text" class="form-control form-control-line" value="" placeholder="
			        	" name="motivo" maxlength="60" required="">
			        </div>
				</div>
				<div class="button-group" style="margin-top: 20px;">
					<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Guardar</button>
					<a href="home-admin" class="btn btn-inverse waves-effect waves-light">Cancelar</a>
				</div>
				{!! Form::close() !!}
			</div>			
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
	jQuery(document).ready(function() {
		// Switchery
		var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
		$('.js-switch').each(function() {
			new Switchery($(this)[0], $(this).data());
		});
		// For select 2
		$(".select2").select2();

		//Bootstrap-TouchSpin
		$(".ajax").select2({
			ajax: {
				url: "https://api.github.com/search/repositories",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term, // search term
						page: params.page
					};
				},
				processResults: function(data, params) {
					// parse the results into the format expected by Select2
					// since we are using custom formatting functions we do not need to
					// alter the remote JSON data, except to indicate that infinite
					// scrolling can be used
					params.page = params.page || 1;
					return {
						results: data.items,
						pagination: {
							more: (params.page * 30) < data.total_count
						}
					};
				},
				cache: true
			},
			escapeMarkup: function(markup) {
				return markup;
			}, // let our custom formatter work
			minimumInputLength: 1,
			//templateResult: formatRepo, // omitted for brevity, see the source of this page
			//templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
		});
	});
</script>
<script>
 // Date Picker
 jQuery('.mydatepicker, #datepicker').datepicker();
 jQuery('#datepicker-autoclose').datepicker({
	 autoclose: true,
	 todayHighlight: true
 });
 jQuery('#date-range').datepicker({
	 toggleActive: true
 });
 jQuery('#datepicker-inline').datepicker({
	 todayHighlight: true
 });
 </script>
<script>
	// Daterange picker
	$('.input-daterange-datepicker').daterangepicker({
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-danger',
		cancelClass: 'btn-inverse'
	});
	$('.input-daterange-timepicker').daterangepicker({
		timePicker: true,
		format: 'MM/DD/YYYY',
		timePickerIncrement: 30,
		timePicker12Hour: true,
		timePickerSeconds: false,
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-danger',
		cancelClass: 'btn-inverse'
	});
	$('.input-limit-datepicker').daterangepicker({
		format: 'MM/DD/YYYY',
		minDate: '06/01/2015',
		maxDate: '06/30/2015',
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-danger',
		cancelClass: 'btn-inverse',
		dateLimit: {
			days: 6
		}
	});
</script>
@endsection