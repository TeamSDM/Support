@extends('layouts.admin')
@section('content')
@can('comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.comments.create") }}">
               Agregar comentario
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">Lista de comentarios</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-borderless table-striped table-hover datatable datatable-Comment">
                <thead class="thead-table">
                    <tr>
                        <th width="10"></th>
                        
                        <th>Ticket</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Comentario</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                        <tr data-entry-id="{{ $comment->id }}">
                            <td></td>
                            
                            <td>{{ $comment->ticket->title ?? '' }}</td>
                            <td>{{ $comment->author_name ?? '' }}</td>
                            <td>{{ $comment->author_email ?? '' }}</td>
                            <td>{{ $comment->user->name ?? '' }}</td>
                            <td>{{ $comment->comment_text ?? '' }}</td>
                            <td>
                                @can('comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.comments.show', $comment->id) }}">Ver</a>
                                @endcan

                                @can('comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.comments.edit', $comment->id) }}">Editar</a>
                                @endcan

                                @can('comment_delete')
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?');" style="display: inline-block;">
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
@can('comment_delete')
  let deleteButtonTrans = 'Eliminar selecion'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.comments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) { 
            alert('No se ha seleccionado nada')

        return
      }

      if (confirm('Desea eliminar?')) {
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
  $('.datatable-Comment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection