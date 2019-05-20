


@extends('layouts.app')

@section('content')

<section class="content login">

		

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de Perifericos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
               <th>id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Role</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                		@foreach($clientes as $periferico)
               <tr>
					<td>{{$periferico->id}}</td>
					@can('perifericos.create')
					<td><a href="{{route('perifericos.show', $periferico->id)}}">{{$periferico->nombre}} {{$periferico->apellido}}</a></td>
					@endcan
					<td>{{$periferico->cedula}}</td>
					<td>{{$periferico->tipo}}</td>
					<td>{{$periferico->departamento_id}}</td>
					<td>
						<div class="">	

	  							@can('perifericos.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('perifericos.edit', $periferico->id)}}" class="btn btn-success "><i class="fa fa-edit"></i></a>
	  							</div>				
								@endcan
	  							@can('perifericos.create')							
								<div class="col-xs-2  ">
									<form method="POST"  action="{{route('perifericos.destroy', $periferico->id)}}">
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
				<th>Email</th>
				<th>Role</th>
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
			  @can('perifericos.create')
			<div class="col-md-2 ">
				<a href="{{route('perifericos.create')}}" class="btn btn-info m-2">Agregar Nuevo Periferico</a>
			</div>
			  @endcan
			
			
		</div>

    </section>


@endsection