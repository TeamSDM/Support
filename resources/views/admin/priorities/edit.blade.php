@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header"><h5>Editar Prioridad</h5></div>
            <div class="card-body">
                <form action="{{ route("admin.priorities.update", [$priority->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($priority) ? $priority->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.priority.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                        <label for="color">Color</label>
                        <input type="text" id="color" name="color" class="form-control colorpicker" value="{{ old('color', isset($priority) ? $priority->color : '') }}">
                        @if($errors->has('color'))
                            <em class="invalid-feedback">
                                {{ $errors->first('color') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.priority.fields.color_helper') }}
                        </p>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-info" type="submit" value="Guardar">
                    </div>
                </form>
        
        
            </div>
        </div>

    </div>
    <div class="col-12 col-md-3 col-sm-12"></div>
</div>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();
</script>
@endsection