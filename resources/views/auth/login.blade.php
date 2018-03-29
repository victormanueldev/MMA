@extends('layouts.loginLayout')
@section('wrapper')
          <div class="login-register" style="background-image:url(assets/images/background/fondo1.jpg);">
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
                <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="email" type="email" value="{{ old('email')}}" placeholder="Email" name="email">
                          </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" type="password"  placeholder="Contraseña" name="password">

                          </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                          <a href="{{ route('password.request') }}" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> ¿Olvidó su Contraseña?</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>¿No tienes una cuenta? <a href="{{route('register')}}" class="text-info m-l-5"><b>Regístrate</b></a></p>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
@endsection
