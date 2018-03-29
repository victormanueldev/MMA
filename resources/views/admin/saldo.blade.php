@extends('layouts.indexAdmin')
@section('tittle')
<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor m-b-0 m-t-0">Consulta de Saldo</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Panel</a></li>
			<li class="breadcrumb-item active">Consultar saldo</li>
		</ol>
	</div>
	<div class="">
		<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10" onclick="javascript:window.location.reload();"><i class="ti-reload text-white"></i></button>
	</div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>Consulta de Saldo</b> <span class="pull-right">CONTRATO No. 1517542115</span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">Mundo Mascotas &reg;</b></h3>
                            <p class="text-muted m-l-5">NIT: 1144129856-7
                                <br/> RL: NATALY CARDONA VALENCIA,
                                <br/> Dir: Cra. 2 No. 65 - 21,
                                <br/> Tel: 4464458,
                                <br/> Cali, Valle</p>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3> &nbsp;<b class="text-info">Hablame Colombia LDI SAS ESP</b></h3>
                            <h4 class="text-muted ">NIT: 900.994.854-4,</h4>
                            <p class="text-muted m-l-30">Web: www.hablame.co,
                                <br/> Dir: Autopista Norte # 97 - 70 Of. 501,
                                <br/> Tel: +57-1 884 46 78,
                                <br/> Bogotá D.C</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <p>Cliente No. {{$cliente}}</p>
                        @if($estadoCuenta == 0)
                        <p>Estado de Cuenta: <span class="badge badge-success">ACTIVADA</span></p>
                        @else
                        <p>Estado de Cuenta: <span class="badge badge-danger">BLOQUEADA</span></p>
                        @endif
                        <p>Cupón de Crédito. {{$credito}}</p>
                        <hr>
                        <h3><b>Saldo Total :</b> ${{$saldo}}</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
