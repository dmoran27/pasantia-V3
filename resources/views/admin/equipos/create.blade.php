@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.store') }}" aria-label="{{ __('Registro') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="identificador" class="col-md-4 col-form-label text-md-right">{{ __('Identificador') }}</label>

                            <div class="col-md-6">
                                <input id="identificador" type="text" class="form-control{{ $errors->has('identificador') ? ' is-invalid' : '' }}" name="identificador" value="{{ old('identificador') }}" required autofocus>

                                @if ($errors->has('identificador'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('identificador') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ old('marca') }}" required autofocus>

                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ old('modelo') }}" autofocus>

                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="serial" class="col-md-4 col-form-label text-md-right">{{ __('Serial') }}</label>

                            <div class="col-md-6">
                                <input id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{ old('serial') }}" autofocus>

                                @if ($errors->has('serial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado_equipo" class="col-md-4 col-form-label text-md-right">{{ __('Estado del equipo') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('estado_equipo') ? ' is-invalid' : '' }}" name="estado_equipo">
                                    @foreach($enumoption2 as $estado_equipo)
                                        <option value="{{$estado_equipo}}">{{$estado_equipo}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('estado_equipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado_equipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="perteneciente" class="col-md-4 col-form-label text-md-right">{{ __('Pertenece al la institucion? ') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente">
                                    @foreach($enumoption as $perteneciente)
                                        <option value="{{$perteneciente}}" >{{$perteneciente}}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('perteneciente'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('perteneciente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                         
                        <div class="form-group row">
                            <label for="observacion" class="col-md-4 col-form-label text-md-right">{{ __('Observacion') }}</label>

                            <div class="col-md-6">
                                <textarea id="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" name="observacion" value="{{ old('observacion') }}" autofocus></textarea>

                                @if ($errors->has('observacion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('observacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">

                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="hidden" name="tipo_id" value="1" required>
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
