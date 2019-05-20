@extends('layouts.app')


@section('content')

<div class="row">
	  @can('users.create')
	<div class="col">
		<a href="{{route('users.create')}}" class="btn btn-outline-info m-2">Agregar Nuevo Tecnico</a>
	</div>
	  @endcan
	<div class="col">
		<h2>Tecnicos</h2>
	</div>
	
</div>
<div class="row">
	
	<div class="col">
		<table width="100%" border="1">
			<thead>
				<th>id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Role</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td><a href="{{route('users.show', $user->id)}}">{{$user->nombre}} {{$user->apellido}}</a></td>
					<td>{{$user->email}}</td>
					<td>{{$user->role}}</td>
					<td>
						<div class="d-flex justify-content-center">	

	  							@can('users.create')
								<a href="{{route('users.show', $user->id)}}" class="btn btn-outline-success m-2">Mostrar</a>
								@endcan
	  							@can('users.create')
								<a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-success m-2">Editar</a>	
								@endcan
	  							@can('users.create')							
								<form method="POST" action="{{route('users.destroy', $user->id)}}">
									@csrf
									{!!method_field('DELETE')!!}

								 <button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>
								</form>
								@endcan
							</div>
					</td>
				</tr>
				
				@endforeach
				
			</tbody>
		</table>
	</div>
</div>

@endsection