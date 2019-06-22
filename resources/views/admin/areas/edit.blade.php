@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.area.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.areas.update", [$area->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.area.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control{{$errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($area) ? $area->nombre : '') }}">
               
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('global.area.fields.descripcion') }}*</label>
                <input type="textarea" id="descripcion" name="descripcion" class="form-control{{$errors->has('descripcion') ? ' is-invalid' : '' }}" value="{{ old('descripcion', isset($area) ? $area->descripcion : '') }}">
               
            </div>
                        @if($errors->all())
            <div class="bg-danger p-3 mb-2 col-12">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                 
                    
            @endif
           <div class="col-12 d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route("admin.areas.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Actualizar  ">
                 
            </div>        </form>
    </div>
</div>

@endsection