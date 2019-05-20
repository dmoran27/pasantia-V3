@extends('layouts.app')


@section('content')


	<h2>{{$users->id}}</h2> 
	<h2>{{$users->nombre}}</h2> 
	<h2>{{$users->apellido}}</h2>
	<h2>{{$users->cedula}}</h2>
	<h2>{{$users->telefono}}</h2>
	<h2>{{$users->sexo}}</h2>
	<h2>{{$users->area_id}}</h2>
	<h2>{{$users->created_at}}</h2>
	<h2>{{$users->updated_at}}</h2>


<a href="{{route('users.index')}}">Volver</a>
@stop