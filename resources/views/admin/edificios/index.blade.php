@extends('layouts.admin')
@section('content')
@can('edificio_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.edificios.create") }}">
                {{ trans('global.add') }} {{ trans('global.edificio.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.edificio.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('global.edificio.fields.nombre') }} 
                        </th>                     
                        
                        <th>
                            {{ trans('global.edificio.fields.acciones') }} 
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
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.edificios.show', $edificio->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('edificio_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.edificios.edit', $edificio) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('edificio_delete')
                                    <form action="{{ route('admin.edificios.destroy', $edificio->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
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