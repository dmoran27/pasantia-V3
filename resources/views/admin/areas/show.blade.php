@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.user.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.user.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $area->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.apellido') }} 
                    </th>
                    <td>
                        {{ $area->descripcion ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $area->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $area->updated_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.sexo') }} 
                    </th>
                    <td>
                        {{ $area->sexo ?? '' }}
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection