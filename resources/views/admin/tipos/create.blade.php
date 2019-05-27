@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.tipo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tipos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.tipo.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('global.tipo.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif                
            </div>

            <div class="form-group {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.tipo.fields.tipo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
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