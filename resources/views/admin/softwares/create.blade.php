@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('softwares.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

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
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('tipo') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo_id">
                                    @foreach($tipos as $tipo)
                                      <option value="{{ $tipo->id}}">{{ $tipo->nombre }}</option>
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
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('descripcion') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <h3>Desea agregar una caracteristica?</h3>
                        <div class="form-group">
                            <label for="caracteristica">Si</label>
                             <input type="radio" name="caracteristica"  id="generar" value="generar">
                            <label for="caracteristica">No</label>
                             <input type="radio" name="caracteristica"  id="ingresar" value="ingresar">
                        </div>


                        <div class="form-group">
                            <label for="caracteristica">Agregar</label>
                             <input type="radio" name="caracteristica"  id="generar" value="generar">
                            <label for="caracteristica">Buscar</label>
                             <input type="radio" name="caracteristica"  id="ingresar" value="ingresar">
                        </div>


                         <form method="POST" action="{{ route('caracteristicas.store') }}" aria-label="{{ __('Registro') }}">
                        @csrf

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
                            <label for="propiedad" class="col-md-4 col-form-label text-md-right">{{ __('Propiedad') }}</label>

                            <div class="col-md-6">
                                <input id="propiedad" type="text" class="form-control{{ $errors->has('propiedad') ? ' is-invalid' : '' }}" name="propiedad" value="{{ old('propiedad') }}" required autofocus>

                                @if ($errors->has('propiedad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('propiedad') }}</strong>
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

                    <div class="form-group row">
                            <label for="buscar" class="col-md-4 col-form-label text-md-right">{{ __('buscar') }}</label>

                            <div class="col-md-6">
                                <input id="buscar" type="text" class="form-control{{ $errors->has('buscar') ? ' is-invalid' : '' }}" name="buscar" value="{{ old('buscar') }}" required autofocus>

                                @if ($errors->has('buscar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buscar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="caracteristica" class="col-md-4 col-form-label text-md-right">{{ __('caracteristica') }}</label>

                            <div class="col-md-6">
                               
                                <select class="form-control{{ $errors->has('caracteristica') ? ' is-invalid' : '' }}" name="caracteristica_id">
                                    @foreach($caracteristicas as $caracteristica)
                                      <option value="{{ $caracteristica->id}}">{{ $caracteristica->nombre }}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('caracteristica'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('caracteristica') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>














                                 <div class="form-group row">
                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                            </div>
                        </div> 

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
