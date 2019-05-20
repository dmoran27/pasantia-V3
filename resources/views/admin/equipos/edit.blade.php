@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                     <form method="POST" action="{{route('equipos.update', $equipos)}}" aria-label="{{ __('Editar') }}">
                        @csrf
                            {!!method_field('PUT')!!}

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$errors->has('nombre') ? old('nombre')  :  $equipos->nombre}}">

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identificador" class="col-md-4 col-form-label text-md-right">{{ __('Identificador') }}</label>

                            <div class="col-md-6">
                                <input id="identificador" type="text" class="form-control{{ $errors->has('identificador') ? ' is-invalid' : '' }}" name="identificador" value="{{$errors->has('identificador') ? old('identificador')  :  $equipos->identificador}}">

                                @if ($errors->has('identificador'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('identificador') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('marca') }}</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{$errors->has('marca') ? old('marca')  :  $equipos->marca}}">

                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{$errors->has('modelo') ? old('modelo')  :  $equipos->modelo}}">

                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="serial" class="col-md-4 col-form-label text-md-right">{{ __('serial') }}</label>

                            <div class="col-md-6">
                                <input id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{$errors->has('serial') ? old('serial')  :  $equipos->serial}}">

                                @if ($errors->has('serial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="perteneciente" class="col-md-4 col-form-label text-md-right">{{ __('perteneciente') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente">
                                    @foreach($enumoption as $perteneciente)
                                        <option value="{{$perteneciente}}" @if($perteneciente === $equipos->perteneciente) selected @endif >{{$perteneciente}}</option>
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
                            <label for="estado_equipo" class="col-md-4 col-form-label text-md-right">{{ __('estado_equipo de Cliente') }}</label>

                            <div class="col-md-6">
                               
                                  <select class="form-control{{ $errors->has('estado_equipo') ? ' is-invalid' : '' }}" name="estado_equipo">
                                    @foreach($enumoption2 as $estado_equipo)
                                        <option value="{{$estado_equipo}}" @if($estado_equipo === $equipos->estado_equipo) selected @endif >{{$estado_equipo}}</option>
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
                            <label for="serial" class="col-md-4 col-form-label text-md-right">{{ __('serial') }}</label>

                            <div class="col-md-6">
                                <textarea id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{$errors->has('serial') ? old('serial')  :  $equipos->serial}}"></textarea> 

                                @if ($errors->has('serial'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serial') }}</strong>
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
