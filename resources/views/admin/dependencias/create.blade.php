@extends('layouts.admin')
@section('content')

<div class="card">
     <div class="card-header">
          <h5 class="text-center ">CREAR NUEVA DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.dependencias.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="text" id="nombre" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}">
                
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
                <select name="edificio_id" id="edificio" class="form-control select2" >
                    @foreach($edificios as $id => $edificio)
                        <option value="{{ $edificio->id }}" >
                            {{ $edificio->nombre }}
                        </option>
                    @endforeach
                </select>
               
                
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
                <a class="btn btn-info" href="{{ route("admin.dependencias.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>
@endsection