@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.tipo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tipos.update", [$tipo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.tipo.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($tipo) ? $tipo->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('global.tipo.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($tipo) ? $tipo->descripcion : '') }}">
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
            </div>
            
             <div class="form-group {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.tipo.fields.tipo') }}*</label>

                <div class="">
                   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} select2 select2-hidden-accessible" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $t)
                            <option value="{{$t}}" @if($t === $tipo->tipo) selected @else '' @endif >{{$t}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <input id="user_id" type="hidden" class="hidden" name="user_id">
                </div>
            </div>
            @if($errors->has('roles'))
                    <p class="help-block">
                        {{ $errors->first('roles') }}
                    </p>
                @endif
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection