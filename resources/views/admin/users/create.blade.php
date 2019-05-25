@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.user.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.user.fields.apellido') }}*</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido') }}">
                @if($errors->has('apellido'))
                    <p class="help-block">
                        {{ $errors->first('apellido') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.user.fields.cedula') }}*</label>
                <input type="text" id="cedula" name="cedula" class="form-control" value="{{ old('cedula') }}">
                @if($errors->has('cedula'))
                    <p class="help-block">
                        {{ $errors->first('cedula') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.user.fields.telefono') }}*</label>
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
           <div class="form-group {{ $errors->has('area')}}">
                <label for="area" class=" col-form-label text-md-right">{{ trans('global.user.fields.area') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="area" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($areas as $area)
                            <option value="{{$area}}">{{$area}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div> 
           <div class="form-group {{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.user.fields.sexo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}">{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
                 
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.user.fields.password') }}</label>
                 <span class="btn btn-info btn-xs select-all">Generar clave</span>
                  <span class="btn btn-info btn-xs select-all">Escribir clave</span>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('global.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Eliminar Todo</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}">{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <p class="help-block">
                        {{ $errors->first('roles') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection