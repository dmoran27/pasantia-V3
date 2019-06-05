@extends('layouts.admin')
@section('content')
@can('edificio_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.edificios.create") }}">
                Agregar nuevo edificio            </a>
        </div>
    </div>
@endcan
<div class="card">
     <div class="card-header">
          <h5 class="text-center ">EDIFICIOS.</h5>
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
                            Acciones 
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($edificios as $key => $edificio )
                        <tr data-entry-id="{{ $edificio->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $edificio->nombre ?? '' }}
                            </td>
                           
                             
                            <td>
                                 @can('edificio_show')
                                    <a class="btn btn-xs btn-success w-100" href="{{ route('admin.edificios.show', $edificio->id) }}">
                                        Ver
                                    </a>
                                @endcan
                                @can('edificio_edit')
                                    <a class="btn btn-xs btn-info w-100" href="{{ route('admin.edificios.edit', $edificio) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('edificio_delete')
                                    <form action="{{ route('admin.edificios.destroy', $edificio->id) }}"class="w-100" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn w-100 btn-xs btn-danger" value="Eliminar">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
 $(function () {

    
 });



    $(function () {
  let deleteButtonTrans = 'Editar Seleccion'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.edificios.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('edificio_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
});

</script>
@endsection