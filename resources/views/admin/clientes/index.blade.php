@extends('layouts.admin')
@section('content')
@can('cliente_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.clientes.create") }}">
                Agregar Nuevo Usuario
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
          <h5 class="text-center ">Lista de Usuarios</h5>
    </div>
   
           

    <div class="card-body">
    
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            
                        </th>
                         <th width="10">
                            #
                        </th>
                        <th>
                            Nombre
                        </th>
                          <th>
                            Apellido
                        </th>
                       
                        <th>
                            Cedula
                        </th>
                        <th>
                            Telefono
                        </th>
                        <th>
                            Sexo
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Tipo
                        </th>
                        <th>
                            Dependencia
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $key => $cliente )
                        <tr data-entry-id="{{ $cliente->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $cliente->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->apellido ?? '' }}
                            </td>
                             <td>
                                {{ $cliente->cedula ?? '' }}
                            </td>
                             <td>
                                {{ $cliente->telefono ?? '' }}
                            </td>
                             <td>
                                {{ $cliente->sexo ?? '' }}
                            </td>
                             <td>
                                {{ $cliente->email ?? '' }}
                            </td>
                             <td>
                                {{ $cliente->tipo ?? '' }}
                            </td>
                            
                            <td>
                               {{ $cliente->dependencia->nombre }}
                                
                            </td>
                            <td>
                                 @can('cliente_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.clientes.show', $cliente->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('cliente_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.clientes.edit', $cliente) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('cliente_delete')
                                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="w-100" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn w-100 btn-xs btn-danger" value="eliminar">Eliminar</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                 <tfoot>
                    <tr>
                         <th width="10">
                            
                        </th>
                         <th width="10">
                            #
                        </th>
                        <th>Nombre</th>
                          <th>Apellido</th>
                       
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Dependencia</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
 <script type="text/javascript">
 //alerta de notificaciones al agregar un usuario
$( document ).ready(function() {
     if('{{$notificacion}}' != ''){
            swal({
  position: 'top-end',
  type: 'success',
  title: '{{$notificacion}}',
  icon: "success",
  successMode: true,
  showConfirmButton: false,
  timer: 2500,
})
}

});


    $(function () {

      // Setup - add a text input to each footer cell
    $('.datatable tfoot th').each( function (i) {
      if (i>1) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
      }
        
    } );


  let deleteButtonTrans = 'Eliminar Seleccion'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clientes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

       if (ids.length === 0) {
         swal("OJO!", "Elemento no existe!", "warning");
        return
      }

       swal({
      title: "Esta Seguro de Eliminar este elemento?",
      text: "Una vez eliminado no podra recuperarlo!",
      icon: "warning",
      dangerMode: true,
      buttons: {
        cancel: {
            text: "Cancelar",
            visible:true
        },
        confirm: {
            text: "Si"
        }
        }
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
              headers: {'x-csrf-token': _token},
              method: 'POST',
              url: config.url,
              data: { ids: ids, _method: 'DELETE' }
            }).done(function () { 
              swal({
                position: 'top-end',
                type: 'success',
                title:  "Elemento Eliminado correctamente!",
                icon: "success",
                successMode: true,
                showConfirmButton: false,
                timer: 2500,
              });



            location.assign("{{ route('admin.clientes.index') }}").deley(3000) })
        }
    });
  }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cliente_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons }).columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
  } );

</script>
@endsection