@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
          <h5 class="text-center ">AGREGAR UN USUARIO</h5>
    </div>

   

    <div class="card-body">
        <form action="{{ route("admin.clientes.store") }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                
            
            @csrf
            <div class="form-group col-12 col-md-4 {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('global.cliente.fields.nombre') }}*</label>
                <input type="text" id="nombre" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"  required pattern="[A-Za-z0-9]+"value="{{ old('nombre') }}">              
            </div>

            <div class="form-group col-12 col-md-4 {{ $errors->has('apellido') ? 'has-error' : '' }}">
                <label for="apellido">{{ trans('global.cliente.fields.apellido') }}*</label>
                <input type="text" id="apellido" name="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" required pattern="[A-Za-z0-9]+" value="{{ old('apellido') }}">             
            </div>

            <div class="form-group col-12 col-md-4 {{ $errors->has('cedula') ? 'has-error' : '' }}">
                <label for="cedula">{{ trans('global.cliente.fields.cedula') }}*</label>
                <input type="number" id="cedula" name="cedula" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}">                
            </div>
            
           <div class="form-group col-12 col-md-4 {{ $errors->has('sexo')}}">
                <label for="sexo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.sexo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $sexo)
                            <option value="{{$sexo}}">{{$sexo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group col-12 col-md-4 {{ $errors->has('tipo')}}">
                <label for="tipo" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.tipo') }}*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
                 
           
            <div class="form-group col-12 col-md-4 {{ $errors->has('dependencia')}}">
                <label for="dependencia" class=" col-form-label text-md-right">{{ trans('global.cliente.fields.dependencia') }}*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }} " name="dependencia_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div>

              <div class="form-group col-12 col-md-6 {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">{{ trans('global.cliente.fields.telefono') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="number"  id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}">
                  </div>
            </div>
             <div class="form-group col-12 col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.cliente.fields.email') }}*</label>
                <div class="input-group">
                    <input type="text" id="email"  name="email"  required  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" aria-describedby="basic-addon2">
                    <span class="input-group-text"  id="basic-addon2">{{_('@unexpo.com')}}</span>
                  </div>
                            
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
        </div>
        </form>




    </div>
</div>
@endsection