@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                     <form method="POST" action="{{route('clientes.update', $clientes)}}" aria-label="{{ __('Editar') }}">
                        @csrf
                            {!!method_field('PUT')!!}

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$errors->has('nombre') ? old('nombre')  :  $clientes->nombre}}">

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{$errors->has('apellido') ? old('apellido')  :  $clientes->apellido}}">

                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('cedula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{$errors->has('cedula') ? old('cedula')  :  $clientes->cedula}}">

                                @if ($errors->has('cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{$errors->has('telefono') ? old('telefono')  :  $clientes->telefono}}">

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('sexo') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo">
                                    @foreach($enumoption as $sexo)
                                        <option value="{{$sexo}}" @if($sexo === $clientes->sexo) selected @endif >{{$sexo}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('sexo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Cliente') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo">
                                    @foreach($enumoption2 as $tipo)
                                        <option value="{{$tipo}}" @if($tipo === $clientes->tipo) selected @endif >{{$tipo}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="dependencia" class="col-md-4 col-form-label text-md-right">{{ __('dependencia') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia_id">
                                    @foreach($dependencias as $dependencia)
                                      <option value="{{ $dependencia->id}}" @if($dependencia->id === $clientes->dependencia_id) selected @else '' @endif >{{$dependencia->nombre}}}}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('dependencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dependencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$errors->has('email') ? old('email')  :  $clientes->email}}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                            </div>
                        </div>


                       
                       
                   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Regitrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
