@extends('layouts.admin')
@section('content')
@can('category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.categories.create") }}">
                <span>Agregar Categoria</span>
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
         <h5>Lista Categoria</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-striped table-hover datatable datatable-Category table-borderless">
                <thead class="thead-table">
                    <tr>
                        <th width="10"></th>
                        <th><span>Nombre</span></th>
                        <th><span>Color</span></th>
                        <th><span class="">Opción</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>
                                {{-- aqui
                                <div class="text center pl-2">
                                    <input type="checkbox" > 
                                </div> --}}
                            </td>
                            
                            <td>{{ $category->name ?? '' }}</td>
                            <td >
                                <div style="background-color:{{ $category->color ?? '#000000' }}">
                                    <div class="color-size rounded"></div>
                                </div> 
                            </td>
                            <td class="">
                                @can('category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $category->id) }}">
                                        Ver<i class="far fa-eye pl-1" ></i>
                                    </a>
                                @endcan

                                @can('category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $category->id) }}">
                                        Editar<i class="fas fa-pencil-alt pl-1"></i>
                                    </a>
                                @endcan

                                @can('category_delete')
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="btn btn-xs btn-danger" type="submit" >
                                            <input class="bg-danger border-0" type="submit" value="Eliminar">
                                            <i class="fas fa-trash-alt pl-1"></i>
                                        </div>
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
@can('category_delete')
  let deleteButtonTrans = 'Eliminar seleccionados'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('No hay filas seleccionadas')

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
  $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection