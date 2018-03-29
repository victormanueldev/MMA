@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Mascotas</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Mascotas</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tabla de Mascotas</h4>
				<h6 class="card-subtitle">Listado de Mascotas registrados en la Base de Datos de MMA &copy; </h6>
				<div class="row m-t-40">
					<!-- Column -->
					<div class="col-md-6 col-lg-6 col-xlg-3">
						<div class="card card-inverse card-info">
							<div class="box bg-info text-center">
								<h1 class="font-light text-white">{{$contadorMascotas}}</h1>
								<h6 class="text-white">Mascotas Registrados</h6>
							</div>
						</div>
					</div>
				</div>
				<!-- Tabla de Clientes -->
				<div class="table-responsive">
					<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID #</th>
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Raza</th>
								<th>Fecha Nac.</th>
								<th>Dueño</th>
							</tr>
						</thead>
						<tbody>
							@foreach($mascotas as $mascota)
							<tr>
								<td>{{$mascota->id}}</td>
								<td>
									<a href="{{route('pet-profile', $mascota->id)}}"><img src="{{ Storage::url($mascota->foto_mascota) }}" alt="user" class="img-circle" style="width: 30px; height: 30px;" /> {{$mascota->nombre_mascota}}</a>
								</td>
								<td>{{$mascota->tipo_mascota}}</td>
								<td>{{$mascota->raza}}</td>
								<td>{{$mascota->fecha_nacimiento_mascota}}</td>
								<td>{{$mascota->nombres}}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6">
									<div class="text-right">
										<ul class="pagination"> </ul>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
@endsection
