@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       <h5>Visualizar Comentarios</h5>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-borderless table-striped">
                <thead class="thead-table">
                    <tr>
                        <th>Ticket</th>
                        <th>Nombre del Autor</th>
                        <th>Email del autor</th>
                        <th>Usuario</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $comment->ticket->title ?? '' }}</th>
                        <th>{{ $comment->author_name }}</th>
                        <th>{{ $comment->author_email }}</th>
                        <th>{{ $comment->user->name ?? '' }}</th>
                        <th>{!! $comment->comment_text !!}</th>
                        <td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Volver a la lista</a>
        </div>


    </div>
</div>
@endsection