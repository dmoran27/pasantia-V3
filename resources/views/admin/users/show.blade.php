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
                        {{ $user->nombre ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.apellido') }} 
                    </th>
                    <td>
                        {{ $user->apellido ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.cedula') }} 
                    </th>
                    <td>
                        {{ $user->cedula ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.telefono') }} 
                    </th>
                    <td>
                        {{ $user->telefono ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.sexo') }} 
                    </th>
                    <td>
                        {{ $user->sexo ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                         {{ trans('global.user.fields.email') }} 
                    </th>
                    <td>
                         {{ $user->email ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                          {{ trans('global.user.fields.area') }} 
                    </th>
                    <td>
                        {{ $user->areas->nombre ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('global.user.fields.roles') }} 
                    </th>
                    <td>
                        @foreach($user->roles as $id => $roles)
                            <span class="badge badge-info">{{ $roles->title }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.creacion') }} 
                    </th>
                    <td>
                        {{ $user->created_at ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                          {{ trans('global.user.fields.actualizacion') }} 
                    </th>
                    <td>
                        {{ $user->updated_at ?? '' }}
                    </td>
                </tr>
                   
            </tbody>
        </table>
    </div>
</div>

@endsection