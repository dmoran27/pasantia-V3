@extends('layouts.app')


@section('content')


	<h2>{{$softwares->id}}</h2> 
	<h2>{{$softwares->nombre}}</h2> 
	<h2>{{$softwares->tipos_id}}</h2>
	@foreach($caracteristicas as $caracteristica)
		<h2>{{$caracteristica->nombre}}</h2>
		<h2>{{$caracteristica->propiedad}}</h2>
	@endforeach


<a href="{{route('softwares.index')}}">Volver</a>
@stop