@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.edificio.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.edificio.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $edificio->nombre ?? '' }}
                    </td>
                </tr>
                
                <tr>
                    <th>
                          {{ trans('global.edificio.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $edificio->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.edificio.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $edificio->updated_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.edificio.fields.sexo') }} 
                    </th>
                    <td>
                        {{ $edificio->sexo ?? '' }}
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection