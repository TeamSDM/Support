@extends('layouts.admin')
@section('content')
@can('priority_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.priorities.create") }}">Agregar Prioridad</a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header"><h5>Lista de Prioridades</h5></div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-borderless table-striped table-hover datatable datatable-Priority">
                <thead class="thead-table">
                    <tr>
                        <th width="10"></th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priorities as $key => $priority)
                        <tr data-entry-id="{{ $priority->id }}">
                            <td></td>
                            <td>{{ $priority->name ?? '' }}</td>
                            <td style="background-color:{{ $priority->color ?? '#000000' }}"></td>
                            <td>
                                @can('priority_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.priorities.show', $priority->id) }}">Ver</a>
                                @endcan

                                @can('priority_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.priorities.edit', $priority->id) }}">Editar</a>
                                @endcan

                                @can('priority_delete')
                                    <form action="{{ route('admin.priorities.destroy', $priority->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Eliminar">
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('priority_delete')
  let deleteButtonTrans = 'Eliminar seleccionado'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.priorities.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('No se han seleccionado filas')

        return
      }

      if (confirm('¿Está seguro?')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Priority:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection