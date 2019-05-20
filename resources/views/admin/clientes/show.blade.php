@extends('layouts.app')


@section('content')


	<h2>{{$clientes->id}}</h2> 
	<h2>{{$clientes->nombre}}</h2> 
	<h2>{{$clientes->apellido}}</h2>
	<h2>{{$clientes->cedula}}</h2>
	<h2>{{$clientes->telefono}}</h2>
	<h2>{{$clientes->sexo}}</h2>
	<h2>{{$clientes->dependencia_id}}</h2>
	<h2>{{$clientes->created_at}}</h2>
	<h2>{{$clientes->updated_at}}</h2>


<a href="{{route('clientes.index')}}">Volver</a>
@stop