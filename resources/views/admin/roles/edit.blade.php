@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Editar Rol</h5>
            </div>
        
            <div class="card-body">
                <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($role) ? $role->title : '') }}" required>
                        @if($errors->has('title'))
                            <em class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.role.fields.title_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                        <label for="permissions">{{ trans('cruds.role.fields.permissions') }}*
                            <span class="btn btn-primary btn-xs select-all">Seleccionar todo</span>
                            <span class="btn btn-primary btn-xs deselect-all">Deseleccionar todo</span></label>
                        <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple" required>
                            @foreach($permissions as $id => $permissions)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('permissions'))
                            <em class="invalid-feedback">
                                {{ $errors->first('permissions') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.role.fields.permissions_helper') }}
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