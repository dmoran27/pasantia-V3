@extends('layouts.admin')
@section('content')

<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DATOS DEL EDIFICIO.</h5>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         Nombre:  
                    </th>
                    <td>
                        {{ $edificio->nombre ?? '' }}
                    </td>
                </tr>
                
                <tr>
                    <th>
                          Fecha de creación:
                    </th>
                    <td>
                        {{ $edificio->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          Fecha de actualización:
                    </th>
                    <td>
                        {{ $edificio->updated_at ?? '' }}
                    </td>
                </tr>
               
                
            </tbody>
        </table>
    </div>
</div>

@endsection