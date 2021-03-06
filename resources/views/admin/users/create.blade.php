@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header"><h5>Crear Usuario</h5></div>
        
            <div class="card-body">
                <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.email_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @if($errors->has('password'))
                            <em class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.password_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                        <label for="roles">Roles
                            <span class="btn btn-info btn-xs select-all ml-2">Seleccionar todo</span>
                            <span class="btn btn-info btn-xs deselect-all">Deseleccionar todo</span></label>
                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                            @foreach($roles as $id => $roles)
                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('roles'))
                            <em class="invalid-feedback">
                                {{ $errors->first('roles') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.user.fields.roles_helper') }}
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