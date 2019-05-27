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
                        {{ $tipo->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.descripcion') }} 
                    </th>
                    <td>
                        {{ $tipo->descripcion ?? '' }}
                    </td>
                </tr>
               <tr>
                    <th>
                         {{ trans('global.cliente.fields.tipo') }}
                    </th>
                    <td>
                       {{ $tipo->tipo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $tipo->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.cliente.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $tipo->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>

@endsection