@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Editar Categoria</h5>
            </div>
            <div class="card-body">
                <form action="{{ route("admin.comments.update", [$comment->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
                        <label for="ticket">Ticket</label>
                        <select name="ticket_id" id="ticket" class="form-control select2" required>
                            @foreach($tickets as $id => $ticket)
                                <option value="{{ $id }}" {{ (isset($comment) && $comment->ticket ? $comment->ticket->id : old('ticket_id')) == $id ? 'selected' : '' }}>{{ $ticket }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ticket_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('ticket_id') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">
                        <label for="author_name">Nombre del autor</label>
                        <input type="text" id="author_name" name="author_name" class="form-control" value="{{ old('author_name', isset($comment) ? $comment->author_name : '') }}" required>
                        @if($errors->has('author_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('author_name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.comment.fields.author_name_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('author_email') ? 'has-error' : '' }}">
                        <label for="author_email">Email del autor</label>
                        <input type="text" id="author_email" name="author_email" class="form-control" value="{{ old('author_email', isset($comment) ? $comment->author_email : '') }}" required>
                        @if($errors->has('author_email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('author_email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.comment.fields.author_email_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user">Usuario</label>
                        <select name="user_id" id="user" class="form-control select2" required>
                            @foreach($users as $id => $user)
                                <option value="{{ $id }}" {{ (isset($comment) && $comment->user ? $comment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('comment_text') ? 'has-error' : '' }}">
                        <label for="comment_text">Comentario</label>
                        <textarea id="comment_text" name="comment_text" class="form-control " required>{{ old('comment_text', isset($comment) ? $comment->comment_text : '') }}</textarea>
                        @if($errors->has('comment_text'))
                            <em class="invalid-feedback">
                                {{ $errors->first('comment_text') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.comment.fields.comment_text_helper') }}
                        </p>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-info" type="submit" value="Guardar">
                    </div>
                </form>
        
        
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-sm-12"></div>
</div>
@endsection