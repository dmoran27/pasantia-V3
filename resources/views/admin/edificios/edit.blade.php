@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.edificio.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.edificios.update", [$edificio->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.edificio.fields.nombre') }}*</label>
                <input type="textedificio" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($edificio) ? $edificio->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
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