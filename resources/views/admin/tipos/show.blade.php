@extends('layouts.app')


@section('content')


	<h2>{{$tipos->id}}</h2> 
	<h2>{{$tipos->nombre}}</h2> 
	<h2>{{$tipos->tipo}}</h2>
	<h2>{{$tipos->descripcion}}</h2>


<a href="{{route('tipos.index')}}">Volver</a>
@stop