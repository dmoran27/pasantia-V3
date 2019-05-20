@extends('layouts.app')

@section('content')

<section class="content login">

		

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de Softwares</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
               <th>id</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Descripcion</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                		@foreach($Softwares as $Software)
               <tr>
					<td>{{$software->id}}</td>
					@can('Softwares.create')
					<td><a href="{{route('softwares.show', $software->id)}}">{{$software->nombre}}</a></td>
					@endcan
					<td>{{$software->tipo}}</td>
					<td>{{$software->descripcion}}</td>
					<td>
						<div class="">	
	  							
	  							@can('Softwares.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('Softwares.edit', $Software->id)}}" class="btn btn-success "><i class="fa fa-edit"></i></a>
	  							</div>				
								@endcan
	  							@can('Softwares.create')							
								<div class="col-xs-2  ">
									<form method="POST"  action="{{route('Softwares.destroy', $Software->id)}}">
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
				<th>Tipo</th>
				<th>Descripcion</th>
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
			  @can('Softwares.create')
			<div class="col-md-2 ">
				<a href="{{route('Softwares.create')}}" class="btn btn-info m-2">Agregar Nuevo Software</a>
			</div>
			  @endcan
			
			
		</div>

    </section>


@endsection