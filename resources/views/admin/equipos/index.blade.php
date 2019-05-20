
@extends('layouts.app')

@section('content')
<section class="content login">	

      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla de equipos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="dataTable1 table table-bordered table-hover">
                <thead>
                <tr>
                	<th>id</th>
				<th>Identificador</th>
				<th>Nombre</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Serial</th>
				<th>Estado del equipo</th>
				<th>Perteneciente</th>
				<th>Fecha de registro</th>
                <th>Fecha ultima modificación</th>
				<th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipos as $equipo)
	               <tr class="item{{$equipo->id}} ">
						<td>{{$equipo->id}}</td>
						<td>{{$equipo->identificador}}</td>
						@can('equipos.create')
						<td>
							<a href="{{route('equipos.show', $equipo)}}" class="show-modal " data-content="{{$equipo->id}}" id="{{$equipo->id}}" ">{{$equipo->nombre}}</a>
						</td>
						@endcan					
						<td>{{$equipo->marca}}</td>
						<td>{{$equipo->modelo}}</td>
						<td>{{$equipo->serial}}</td>
						<td>{{$equipo->estado_equipo}}</td>
						<td>{{$equipo->perteneciente}}</td>
						 <td>{{date("d/m/Y", strtotime($equipo->created_at)) }}</td>
                        <td>{{date("d/m/Y", strtotime($equipo->updated_at)) }}</td>
						<td class="d-flex justify-content-between">
							@can('equipos.create')
		  					<a href="{{route('equipos.edit', $equipo)}}" class="btn btn-success "><i class="fa fa-edit"></i></a>

							@endcan
		  					@can('equipos.create')
		  					<button class="delete-modal btn btn-danger" data-id="{{$equipo->id}}" data-title="{{$equipo->nombre}}" data-content="{{$equipo->identificador}}"><i class="fa fa-trash"></i></button>		

							@endcan 
			                       
                                        
						</td>
					</tr>
                @endforeach
                </tbody>
                <tfoot>
	                <tr>
		               	<th>id</th>
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Serial</th>
						<th>Estado del equipo</th>
						<th>Perteneciente</th>
						<th>Fecha de registro</th>
                   		<th>Fecha ultima modificación</th>
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
			  @can('equipos.create')
			<div class="col-md-2 ">
				<a href="{{route('equipos.create')}}" class="btn btn-info add m-2">Agregar Nuevo Equipo</a>
			</div>
			  @endcan
			
			
		</div>

</section>
`  
     @include('modules.equipos.show')
     
    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Seguro que quiere eliminar este Equipo?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="title_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span>No, cancelar</span></button>
               			<button type="button" class="btn btn-danger delete" data-dismiss="modal"><span>Si, eliminar</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
     
    <script type="text/javascript">
		//Config DataTable
		$('.dataTable1').DataTable({
	      'paging'      : true,
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : true
	    });

		//-- AJAX CRUD operations -->
         // Show a post
        $(document).on('click', '.show-modal', function(e) {
        	 e.preventDefault();
        	 	$('.modal-title').text('Detalles del equipo');
        	 	$('#showModal').modal('show')
        	 
            $.ajax({
            	 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: 'GET',
                url: '/equipos/' + $('.show-modal').attr("id"),  
                 success: function(data){ 
                      console.log(data); 
                    				
		            $('#id_show').val(data['id']);
		            $('#title_show').val(data['nombre']);
		            $('#identificador_show').val(data['identificador']);
		            $('#marca_show').val(data['marca']);
		            $('#modelo_show').val(data['modelo']);
		            $('#serial_show').val(data['serial']);
		            $('#modificacion_show').val("{{date('d/m/Y', strtotime("+data['created_at']+"))}}");
		            $('#registro_show').val("{{date('d/m/Y', strtotime("+data['updated_at']+"))}}");
		            $('#pertenece_show').val(data['perteneciente']);
		            $('#estado_show').val(data['estado_equipo']);
		            				
					 
	                },
                    fail: function(){
                       console.log("error al cargar pagina"); 
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }    
            });
        });


        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Eliminar');
            $('#id_delete').val($(this).data('id'));
            $('#title_delete').val($(this).data('title'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });


        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
            	 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: 'DELETE',
                url: '/equipos/' + id,
               
                
                    
                 success: function(data){ 
                      
                    $('.item' + data['id']).remove();
                     console.log(data['id']); 
	                },
                    fail: function(){
                       console.log("error al cargar pagina"); 
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }    
            });
        });

    </script>
@endsection