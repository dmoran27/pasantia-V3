@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.cliente.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         {{ trans('global.cliente.fields.nombre') }}  
                    </th>
                    <td>
                        {{ $cliente->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.apellido') }} 
                    </th>
                    <td>
                        {{ $cliente->apellido ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $cliente->cedula ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $cliente->telefono ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.sexo') }} 
                    </th>
                    <td>
                        {{ $cliente->sexo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         {{ trans('global.cliente.fields.email') }} 
                    </th>
                    <td>
                         {{ $cliente->email ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                          {{ trans('global.cliente.fields.area') }} 
                    </th>
                    <td>
                        {{ $cliente->tipo ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                         {{ trans('global.cliente.fields.area') }}
                    </th>
                    <td>
                       {{ $cliente->dependencia->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $cliente->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $cliente->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>

@endsection