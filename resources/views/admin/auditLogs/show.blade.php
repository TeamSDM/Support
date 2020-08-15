@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Vizualizar el registro de auditoría</h4>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-borderless">
                <tbody>
                    <thead class="thead-table">
                    <tr class="">
                        <th width="10"></th>
                        {{-- <th><span>ID</span></th> --}}
                        <th><span>Descripción</span></th>
                        <th><span>Tipo sujeto</span></th>
                        <th><span>Usuario</span></th>
                        <th><span>Host</span></th>
                        <th><span>Creado</span></th>
                        
                    </tr>
                    </thead>
                    <tr>
                        <th></th>
                        <th>{{ $auditLog->description }}</th>
                        <th>{{ $auditLog->subject_type }}</th>
                        <th>{{ $auditLog->author_name}}</th>
                        <th>{{ $auditLog->host }}</th>
                        <th>{{ $auditLog->created_at }}</th>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Volver a la lista
            </a>
        </div>


    </div>
</div>
@endsection