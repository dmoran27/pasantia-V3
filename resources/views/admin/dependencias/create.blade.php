@extends('layouts.admin')
@section('content')

<div class="card">
     <div class="card-header">
          <h5 class="text-center ">CREAR NUEVA DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.areas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif                
            </div>
            <div class="form-group {{ $errors->has('piso')}}">
                <label for="piso" class=" col-form-label text-md-right">Piso*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('piso') ? ' is-invalid' : '' }}" name="piso" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for ($i = 0; $i <= 9; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                       
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('edificio') ? 'has-error' : '' }}">
                <label for="edificio">Edificio*</label>
                    <span class="btn btn-info btn-xs select-all">Seleccionar Todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Vaciar Campo</span></label>
                <select name="edificio_id" id="edificio" class="form-control select2" >
                    @foreach($edificios as $id => $edificio)
                        <option value="{{ $id }}" {{ (in_array($id, old('edificio', [])) || isset($role) && $role->edificio->contains($id)) ? 'selected' : '' }}>
                            {{ $edificio->nombre }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('edificio'))
                    <p class="help-block">
                        {{ $errors->first('edificio') }}
                    </p>
                @endif
                
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Guardar">
            </div>
        </form>
    </div>
</div>
@endsection