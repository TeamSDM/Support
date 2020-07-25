@can($viewGate)
{{-- para enviar el id al dar clic en ver es {{ $row->id }} --}}
        {{-- <a href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}"> --}}
            <input class="btn btn-xs btn-primary" type="button" name="activar" value="Ver" onclick="activar('{{ $row->id }}')" id="inicio">
        </a>
    
@endcan
@can($editGate)
<a class="btn btn-xs btn-info" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">Editar</a>
@endcan
@can($deleteGate)
<form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="Eliminar">
</form>
@endcan
<script src="{{ asset('js/crono.js') }}"></script>
