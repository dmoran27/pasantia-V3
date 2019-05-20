@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                     <form method="POST" action="{{route('caracteristicas.update', $caracteristicas)}}" aria-label="{{ __('Editar') }}">
                        @csrf
                            {!!method_field('PUT')!!}

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$errors->has('nombre') ? old('nombre')  :  $caracteristicas->nombre}}">

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="propiedad" class="col-md-4 col-form-label text-md-right">{{ __('propiedad') }}</label>

                            <div class="col-md-6">
                                <input id="propiedad" type="text" class="form-control{{ $errors->has('propiedad') ? ' is-invalid' : '' }}" name="propiedad" value="{{$errors->has('propiedad') ? old('propiedad')  :  $caracteristicas->propiedad}}">

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
