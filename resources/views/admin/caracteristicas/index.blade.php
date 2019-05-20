

@extends('layouts.app')

@section('content')

<section class="content login">

		

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de Caracteristicas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
				<th>Nombre</th>
				<th>Propiedad</th>
				<th>Usuario</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                		@foreach($caracteristicas as $caracteristica)
               <tr>
					<td>{{$caracteristica->id}}</td>
					<td>{{$caracteristica->nombre}}</td>
					<td>{{$caracteristica->propiedad}}</td>
					<td>{{$caracteristica->user_id}}</td>
					<td>
						<div class="">	

	  							@can('caracteristicas.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('caracteristicas.show', $caracteristica->id)}}" class="btn btn-info ">Mostrar</a>
	  							</div>
	  							@endcan
	  							@can('caracteristicas.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('caracteristicas.edit', $caracteristica->id)}}" class="btn btn-success ">Editar</a>
	  							</div>				
								@endcan
	  							@can('caracteristicas.create')							
								<div class="col-xs-2  ">
									<form method="POST"  action="{{route('caracteristicas.destroy', $caracteristica->id)}}">
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
                 <th>Id</th>
				<th>Nombre</th>
				<th>Propiedad</th>
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
			  @can('caracteristicas.create')
			<div class="col-md-2 ">
				<a href="{{route('caracteristicas.create')}}" class="btn btn-info m-2">Agregar Nueva caracteristica</a>
			</div>
			  @endcan
			
			
		</div>

    </section>


@endsection