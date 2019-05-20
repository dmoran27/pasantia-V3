


@extends('layouts.app')

@section('content')

<section class="content login">

		

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
                <th>id</th>
				<th>Nombre</th>
				<th>Cedula</th>
				<th>Tipo</th>
				<th>Departamento</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                		@foreach($clientes as $cliente)
               <tr>
					<td>{{$cliente->id}}</td>
@can('clientes.create')
					<td><a href="{{route('clientes.show', $cliente->id)}}">{{$cliente->nombre}} {{$cliente->apellido}}</a></td>
			@endcan		
					<td>{{$cliente->cedula}}</td>
					<td>{{$cliente->tipo}}</td>
					<td>{{$cliente->departamento_id}}</td>
					<td>
						<div class="">	

	  							
	  							
	  							@can('clientes.create')
	  							<div class="col-xs-2 ">
	  								<a href="{{route('clientes.edit', $cliente->id)}}" class="btn btn-success "><i class="fa fa-edit"></i></a>
	  							</div>				
								@endcan
	  							@can('clientes.create')							
								<div class="col-xs-2  ">
									<form method="POST"  action="{{route('clientes.destroy', $cliente->id)}}">
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
				<th>Cedula</th>
				<th>Tipo</th>
				<th>Departamento</th>
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
			  @can('clientes.create')
			<div class="col-md-2 ">
				<a href="{{route('clientes.create')}}" class="btn btn-info m-2">Agregar Nuevo Cliente</a>
			</div>
			  @endcan
			
			
		</div>

    </section>


@endsection