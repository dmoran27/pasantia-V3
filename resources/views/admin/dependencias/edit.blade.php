@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.dependencia.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.dependencias.update", [$dependencia->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.dependencia.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($dependencia) ? $dependencia->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
            </div>
             <div class="form-group {{ $errors->has('piso')  ? 'has-error' : ''}}">
                <label for="piso" class=" col-form-label text-md-right">{{ trans('global.dependencia.fields.piso') }}*</label>
                <div class="">   
                    <select id="piso" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }}" name="piso" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{ $dependencia->piso }}" @if($dependencia->piso== $i) selected @else '' @endif>{{ $i }}</option>
                        @endfor
                       
                      
                      </select>
                </div>
            </div>
             <div class="form-group {{ $errors->has('edificio') ? 'has-error' : '' }}">
                <label for="edificio" class=" col-form-label text-md-right">{{ trans('global.role.fields.edificio') }}*
                <div>
                    <select name="edificio" id="edificio" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }} select2" name="edificio_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($edificios as $edificio)
                          <option value="{{ $edificio->id}}" @if($edificio->id === $dependencia->edificio_id) selected @else '' @endif >{{$edificio->nombre}}</option>
                      
                        @endforeach
                    </select>
                </div>
            
                
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection