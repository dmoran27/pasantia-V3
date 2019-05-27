@extends('layouts.admin')
@section('content')

@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.softwares.create") }}">
                {{ trans('global.add') }} {{ trans('global.software.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.software.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('global.software.fields.nombre') }} 
                        </th>
                          <th>
                            {{ trans('global.software.fields.descripcion') }} 
                        </th>
               
                        <th>
                            {{ trans('global.software.fields.tipo') }}
                        </th>
                        
                        <th>
                            {{ trans('global.software.fields.acciones') }} 
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($softwares as  $software )
                        <tr data-entry-id="{{ $software->id }}">
                            <td>
                           
                            </td>
                            <td>
                                  {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $software->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $software->descripcion ?? '' }}
                            </td>
                             
                             <td>
                                {{ $software->tipo->nombre ?? '' }}
                            </td>
                            
                            <td>
                                 @can('user_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.softwares.show', $software->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.softwares.edit', $software) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.softwares.destroy', $software->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.softwares.massDestroy') }}",
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
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
});

</script>
@endsection