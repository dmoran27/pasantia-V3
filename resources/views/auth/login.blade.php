<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | ORTSI</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
 

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  </head>
  <body class=" ">
    
<div class="container-fluid login-bg"  style="background: url({{asset("/img/Parque_La_Llovizna.jpg")}});" >
    <div class="row logo d-flex justify-content-star align-items-center">
        <div class="col-sm-2 col-12 text-center text-sm-left">
            <img src=" {{ asset("/img/unexpo.png")}}" class="img-fluid">
        </div>
        <div class="col-sm-8 text-center text-sm-left col-12">
            <h3> Universidad Nacional Experimental Politécnica <br>"Antonio José de Sucre"<br> Vicerrectorado Puerto Ordaz</h3>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center flex-wrap formulario">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="text-center"><h4>{{ __('Sistema ORTSI') }}</h4></div>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group input d-flex align-items-center  row">
                        <div class="1">
                            <i class="fa fa-user pull-left"></i>
                        </div>
                        <div class="col-11">
                            <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula"  placeholder="Cedula" value="{{ old('cedula') }}" required autofocus>

                            @if ($errors->has('cedula'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group  input d-flex align-items-center row">
                       
                       <div class="1">
                            <i class="fa fa-lock pull-left"></i>
                        </div>
                        <div class="col-11">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Clave"  name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label pl-5" For="remember">
                                    {{ __('   Recordar Sesión') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-12">
                            <button type="submit" class="btn">
                                {{ __('Iniciar Sesion') }}
                            </button>
                        </div>
                    </div>

                    
            </form>         
        </div>
    </div>
</div>
</body>
</html>