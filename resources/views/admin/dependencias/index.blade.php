@extends('layouts.admin')
@section('content')
@can('dependencia_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.dependencias.create") }}">
              Agregar nueva dependencia
            </a>
        </div>
    </div>
@endcan
<div class="card">
      <div class="card-header">
          <h5 class="text-center ">DEPENDENCIAS</h5>
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
                            Piso
                        </th>
                        <th>
                            Edificio
                        </th>                      
                        
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dependencias as $key => $dependencia )
                        <tr data-entry-id="{{ $dependencia->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $dependencia->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $dependencia->piso ?? '' }}
                            </td>
                            <td>
                                {{ $dependencia->edificio->nombre ?? '' }}
                            </td>
                             
                            <td>
                                 @can('dependencia_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.dependencias.show', $dependencia->id) }}">
                                       Ver
                                    </a>
                                @endcan
                                @can('dependencia_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.dependencias.edit', $dependencia->id) }}">
                                       Editar
                                    </a>
                                @endcan
                                @can('dependencia_delete')
                                    <form action="{{ route('admin.dependencias.destroy', $dependencia->id) }}" class='w-100' method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger w-100" value="Eliminar">
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
                            
                        </th>
                        <th>Nombre</th>
                          <th>Piso</th>
                        <th>Edificio</th>                      
                        
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
       $('.datatable tfoot tr th').each( function (i) {
      if (i>1) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="w-100" placeholder="Buscar '+title+'" />' );
      }
        
    } );

  let deleteButtonTrans = 'Eliminar Selección'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dependencias.massDestroy') }}",
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



            location.assign("{{ route('admin.dependencias.index') }}").deley(3000) })
        }
    });
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dependencia_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
});

</script>
@endsection