@extends('layouts.admin')
@section('content')

<div class="card">
      <div class="card-header">
          <h5 class="text-center ">ACTUALIZAR EDIFICIO.</h5>
    </div>


    <div class="card-body">
        <form action="{{ route("admin.edificios.update", [$edificio->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">Nombre*</label>
                <input type="textedificio" id="nombre" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre', isset($edificio) ? $edificio->nombre : '') }}">
               
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
                <a class="btn btn-info" href="{{ route("admin.clientes.index") }}">
                    Volver
                </a>
                <input class="btn btn-success" type="submit" value="Guardar  ">
                 
            </div>
        </form>
    </div>
</div>

@endsection