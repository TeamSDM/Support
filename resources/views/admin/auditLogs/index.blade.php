@extends('layouts.admin')
@section('content')

<div class="card rounded">
    <div class="card-header">
        <h3>Lista de registros de auditoría</h3>
    </div>
    <div class="card-body">
        <table class="table table-borderless table-hover ajaxTable datatable datatable-AuditLog ">
            <thead class="thead-table">
                <tr>
                    <th width="10"></th>
                    {{-- <th><span>ID</span></th> --}}
                    <th><span>Descripción</span></th>
                    {{-- <th><span>ID sujeto</span></th> --}}
                    <th><span>Tipo sujeto</span></th>
                    <th><span>Usuario</span></th>
                    <th><span>Host</span></th>
                    <th><span>Creado</span></th>
                    <th><span>Opción</span>
                        {{-- &nbsp; --}}
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.audit-logs.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        //{ data: 'id', name: 'id' },
        { data: 'description', name: 'description' },
       // { data: 'subject_id', name: 'subject_id' },
        { data: 'subject_type', name: 'subject_type' },
        { data: 'user_id', name: 'user_id' }, //preguntar sobre como incluir el nombre
        { data: 'host', name: 'host' },
        { data: 'created_at', name: 'created_at' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-AuditLog').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection