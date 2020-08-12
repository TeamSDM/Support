@extends('layouts.admin')
@section('content')
{{-- @can('priority_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.knowledgebase.create") }}">Agregar conocimientos</a>
        </div>
    </div>
@endcan --}}

{{-- <div class="row">
        <div class="card ml-4" style="width: 19rem;">
            <div class="card-body cardPosition">
                <span class="card-title cardTitle">Apoteosys</span>
                <i class="fas fa-folder fa-5x"></i>
                <br>
                <a href="#" class="btn btn-primary">Manuales</a>
                <a href="#" class="btn btn-primary ml-3">Knowledge</a>
            </div>
        </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Aurora</span>
          <i class="fas fa-folder fa-5x"></i>
          <br>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
    </div>
      <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
      </div>
      <div class="card ml-4" style="width: 19rem;">
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
      </div>
      <div class="card ml-4" style="width: 19rem;" >
        <div class="card-body">
          <span class="card-title">Special title treatment</span>
          <i class="fas fa-folder fa-5x"></i>
          <p class="card-text"></p>
          <a href="#" class="btn btn-primary">Manuales</a>
          <a href="#" class="btn btn-primary ml-3">Knowledge</a>
        </div>
      </div>
</div> --}}
{{-- 
  
<div class="card ">
    <div class="card-header"><h5>Base de conocimiento</h5></div>
    {{-- <div class="row"> --}}
        {{-- <div class="card-body">

            @foreach ($category as $key => $categoria)
                <div class="categoria_linea p-2 m-1 pr-5">
                    {{ $categoria->name }}
                    
                </div>
                @can('knowledgebase_show')
                    <a class="btn btn-xs btn-primary" href="{{ route('admin.knowledgebase.show', $categoria->id) }}">Ver</a>
                @endcan
            @endforeach
        </div> --}}
    {{-- </div> --}}
        {{-- <div class="table-responsive">
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
                    @foreach($knowledgebase as $key => $knowledgeBase)
                    <tr data-entry-id="{{ $knowledgeBase->id }}">
                            <td></td>
                            <td>{{ $knowledgeBase->name ?? '' }}</td>
                            <td style="background-color:{{ $knowledgeBase->color ?? '#000000' }}"></td>
                            <td>
                                @can('knowledgebase_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.knowledgebase.show', $knowledgeBase->id) }}">Ver</a>
                                @endcan

                                @can('knowledgebase_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.knowledgebase.edit', $knowledgeBase->id) }}">Editar</a>
                                @endcan

                                @can('knowledgebase_delete')
                                    <form action="{{ route('admin.knowledgebase.destroy', $knowledgeBase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        </div> --}}


    {{-- </div>
</div> --}} 
@foreach ($category as $key => $categoria)
  <div class="card ml-4 d-inline" style="width: 19rem;">
    <div class="card-body">
      <span class="card-title">{{ $categoria->name }}</span>
      <i class="fas fa-folder fa-5x"></i>
      <p class="card-text"></p>
      <a href="#" class="btn btn-primary">Manuales</a>
      <a href="#" class="btn btn-primary ml-3">Knowledge</a>
    </div>
  </div>
@endforeach
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('knowledgebase_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.knowledgebase.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-KnowledgeBase:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection