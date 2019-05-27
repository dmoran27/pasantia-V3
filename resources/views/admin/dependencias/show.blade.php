@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.dependencia.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.dependencia.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $dependencia->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.dependencia.fields.piso') }} 
                    </th>
                    <td>
                        {{ $dependencia->piso ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.dependencia.fields.edificio') }} 
                    </th>
                    <td>
                        {{ $dependencia->edificio->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.dependencia.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $dependencia->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.dependencia.fields.actualizacion') }} 
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