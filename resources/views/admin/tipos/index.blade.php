

@extends('layouts.app')

@section('content')

<div class="row">
	  @can('tipos.create')
	<div class="col">
		<a href="{{route('tipos.create')}}" class="btn btn-outline-info m-2">Agregar Nuevo tipo</a>
	</div>
	  @endcan
	<div class="col">
		<h2>tipos</h2>
	</div>
	
</div>
<div class="row">
	
	<div class="col">
		<table width="100%" border="1">
			<thead>
				<th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Usuario</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				@foreach($tipos as $tipo)
				<tr>
					<td>{{$tipo->id}}</td>
					<td>{{$tipo->nombre}}</td>
					<td>{{$tipo->descripcion}}</td>
					<td>{{$tipo->tipo}}</td>
					<td>{{$tipo->user_id}}</td>
					<td>
						<div class="d-flex justify-content-center">	

	  							@can('tipos.create')
								<a href="{{route('tipos.show', $tipo->id)}}" class="btn btn-outline-success m-2">Mostrar</a>
								@endcan
	  							@can('tipos.create')
								<a href="{{route('tipos.edit', $tipo->id)}}" class="btn btn-outline-success m-2">Editar</a>	
								@endcan
	  							@can('tipos.create')							
								<form method="POST" action="{{route('tipos.destroy', $tipo->id)}}">
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




@extends('layouts.app')

@section('content')

<section class="content login">

		

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de Tipos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
               <th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Usuario</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                		@foreach($tipos as $tipo)
               <tr>
					<td>{{$tipo->id}}</td>
					<td>{{$tipo->nombre}}</td>
					<td>{{$tipo->descripcion}}</td>
					<td>{{$tipo->tipo}}</td>
					<td>{{$tipo->user_id}}</td>
					<td>
						<div class="">	

	  							@can('tipos.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('tipos.show', $tipo->id)}}" class="btn btn-info ">Mostrar</a>
	  							</div>
	  							@endcan
	  							@can('tipos.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('tipos.edit', $tipo->id)}}" class="btn btn-success ">Editar</a>
	  							</div>				
								@endcan
	  							@can('tipos.create')							
								<div class="col-xs-2  ">
									<form method="POST"  action="{{route('tipos.destroy', $tipo->id)}}">
									@csrf
									{!!method_field('DELETE')!!}

								 <button type="submit" class="btn btn-danger">Eliminar</button>
								</form>
							</div>
								</div>
								@endcan
							</div>
					</td>
				</tr>
				
			
                	@endforeach
                </tbody>
                <tfoot>
                <tr>
               <th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Usuario</th>
				<th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row d-flex justify-content-end ">
			  @can('tipos.create')
			<div class="col-md-2 ">
				<a href="{{route('tipos.create')}}" class="btn btn-info m-2">Agregar Nuevo Tipo</a>
			</div>
			  @endcan
			
			
		</div>

    </section>


@endsection