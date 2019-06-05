@extends('layouts.admin')
@section('content')

<div class="card">
     <div class="card-header">
          <h5 class="text-center ">DATOS DE DEPENDENCIA.</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nombre:
                    </th>
                    <td>
                        {{ $dependencia->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Piso:
                    </th>
                    <td>
                        {{ $dependencia->piso ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Edificio:
                    </th>
                    <td>
                        {{ $dependencia->edificio->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de creacion:
                    </th>
                    <td>
                        {{ $dependencia->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         Fecha de actualizacion:
                    </th>
                    <td>
                        {{ $dependencia->updated_at ?? '' }}
                    </td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
</div>

@endsection