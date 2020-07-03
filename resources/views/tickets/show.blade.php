@extends('layouts.admin')
@section('content')
<div class="row">
    {{-- <div class="col-12 col-md-0 col-sm-12"></div> --}}
    <div class="col-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header"><h5>Visualizar Ticket</h5></div>
        
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-2">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-table">
                            <tr>
                                <th>Creado</th>
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>Anexos</th>
                                <th>Estado</th>
                                <th>Prioridad</th>
                                <th>Categoria</th>
                                <th>Nombre del autor</th>
                                <th>Email del autor</th>
                                <th>Asignado al usuario</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td>{{ $ticket->created_at }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{!! $ticket->content !!}</td>
                                <td>
                                    @foreach($ticket->attachments as $attachment)
                                        <a href="{{ $attachment->getUrl() }}" target="_blank">{{ $attachment->file_name }}</a>
                                    @endforeach
                                </td>
                                <td>{{ $ticket->status->name ?? '' }}</td>
                                <td>{{ $ticket->priority->name ?? '' }}</td>
                                <td>{{ $ticket->category->name ?? '' }}</td>
                                <td>{{ $ticket->author_name }}</td>
                                <td>{{ $ticket->author_email }}</td>
                                <td>{{ $ticket->assigned_to_user->name ?? '' }}</td>
                                
                                    
                            </tr>
                            <tr>
                                <th colspan="10"></th>
                            </tr>
                            <tr>
                                <th>Comentarios</th>
                                <td colspan="9">
                                    @forelse ($ticket->comments as $comment)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="font-weight-bold"><a href="mailto:{{ $comment->author_email }}">{{ $comment->author_name }}</a> ({{ $comment->created_at }})</span>
                                                <p>{{ $comment->comment_text }}</p>
                                            </div>
                                        </div>
                                        <hr class="m-0"/>
                                    @empty
                                        <div class="row">
                                            <div class="col">
                                                <p>No hay comentarios.</p>
                                            </div>
                                        </div>
                                        <hr />
                                    @endforelse
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-sm-12">

                                            <form action="{{ route('admin.tickets.storeComment', $ticket->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="comment_text">Deje un comentario</label>
                                                    
                                                    <div class="input-group">
                                                        <input type="textarea" class="textarea-coment form-control" required>
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-primary ml-2">@lang('Enviar ')<i class="fas fa-paper-plane"></i></button>
                                                        </span>

                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-default my-2" href="{{ route('admin.tickets.index') }}">Volver a la lista</a>
        
                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary">
                    @lang('Editar') @lang('Ticket')
                </a>
        
                {{-- <nav class="mb-3">
                    <div class="nav nav-tabs">
        
                    </div>
                </nav> --}}
            </div>
        </div>
    </div>
    {{-- <div class="col-12 col-md-3 col-sm-12"></div> --}}
</div>
@endsection
