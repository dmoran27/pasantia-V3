@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.edificio.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.edificios.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.edificio.fields.nombre') }}*</label>
                <input type="textarea" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>
                
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection