@extends('layouts.admin')
@section('content')

<div class="card">
      <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR DATOS DE DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.dependencias.update", [$dependencia->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($dependencia) ? $dependencia->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
            </div>
             <div class="form-group {{ $errors->has('piso')  ? 'has-error' : ''}}">
                <label for="piso" class=" col-form-label text-md-right">Piso*</label>
                <div class="">   
                    <select id="piso" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }}" name="piso" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{ $dependencia->piso }}" @if($dependencia->piso== $i) selected @else '' @endif>{{ $i }}</option>
                        @endfor
                       
                      
                      </select>
                </div>
            </div>
             <div class="form-group {{ $errors->has('edificio') ? 'has-error' : '' }}">
                <label for="edificio" class=" col-form-label text-md-right">Edificio*</label>
                <div>
                    <select name="edificio" id="edificio" class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }} select2 w-100" name="edificio_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($edificios as $edificio)
                          <option value="{{ $edificio->id}}" @if($edificio->id === $dependencia->edificio_id) selected @else '' @endif >{{$edificio->nombre}}</option>
                      
                        @endforeach
                    </select>
                </div>
            
                
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Guardar">
            </div>
        </form>
    </div>
</div>

@endsection