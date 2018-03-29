@extends('layouts.indexAdmin')
@section('css')
@endsection
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Clientes</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Clientes</li>
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
				<h4 class="card-title">Tabla de Clientes</h4>
				<h6 class="card-subtitle">Listado de Clientes registrados en la Base de Datos de MMA &copy; </h6>
				<div class="row m-t-40">
					<!-- Column -->
					<div class="col-md-6 col-lg-6 col-xlg-3">
						<div class="card card-inverse card-info">
							<div class="box bg-info text-center">
								<h1 class="font-light text-white">{{$contadorUsers}}</h1>
								<h6 class="text-white">Usuarios Registrados</h6>
							</div>
						</div>
					</div>
					<!-- Column -->
					<div class="col-md-6 col-lg-6 col-xlg-3">
						<div class="card card-primary card-inverse">
							<div class="box text-center">
								<h1 class="font-light text-white">{{$alimentacion}}</h1>
								<h6 class="text-white">Perfiles de Compra</h6>
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
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Email</th>
								<th>Direccion</th>
								<th>Fecha Nac.</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$user->numero_documento}}</td>
								<td>
									<a href="{{route('perfil-cliente', $user->id)}}"><img src="{{ Storage::url($user->foto) }}" alt="user" class="img-circle" style="width: 30px; height: 30px;" /> {{$user->nombres}}</a>
								</td>
								<td>{{$user->apellidos}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->direccion}}</td>
								<td>{{$user->fecha_nacimiento}}</td>
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
