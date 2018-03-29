@extends('layouts.loginLayout')
@section('wrapper')
<div class="login-register" style="background-image:url({{asset('assets/images/background/fondo1.jpg')}})">
    <div class="login-box card" style="background-color: #ffffffb3;">
    <div class="card-body">
      <div class="l-block">
        <div class="lb-header" style="margin-bottom: 30px;">
          <div class="cnt-logo"><img src="{{asset('assets/img/logo.png')}}" alt="No encontrado" style="width: 100%;height: 100%;"></div>
        </div>
      </div>
      @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
        @endforeach
      @endif
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
        <form class="form-horizontal form-material" id="loginform" action="{{ route('password.email') }}" method="POST">
          {{ csrf_field() }}
            <h3 class="box-title m-b-20">Restablecer Contraseña</h3>
            <div class="form-group">
              <div class="col-xs-12">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
              </div>
            </div>
            <div class="form-group text-center m-t-20">
              <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Restablecer</button>
              </div>
            </div>
          </form>
    </div>
  </div>
</div>
@endsection
