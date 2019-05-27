@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clientes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.cliente.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.cliente.fields.apellido') }}*</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}">
                @if($errors->has('apellido'))
                    <p class="help-block">
                        {{ $errors->first('apellido') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.cliente.fields.cedula') }}*</label>
                <input type="text" id="cedula" name="cedula" class="form-control" value="{{ old('cedula') }}">
                @if($errors->has('cedula'))
                    <p class="help-block">
                        {{ $errors->first('cedula') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.cliente.fields.telefono') }}*</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text"  id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }} data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" name="telefono" value="{{ old('telefono') }}">
                  </div>
                  <!-- /.input group -->
                    @if($errors->has('telefono'))
                    <p class="help-block">
                        {{ $errors->first('telefono') }}
                    </p>
                @endif
            </div>
            
           <div class="form-group {{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.sexo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}">{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.tipo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
                 
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.cliente.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('dependencia')}}">
                <label for="dependencia" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.dependencia') }}*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} " name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-6">
                    <input id="user_id" type="hidden" class="hidden" name="user_id">
                </div>
            </div>
            @if($errors)
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                    
                @endif
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection