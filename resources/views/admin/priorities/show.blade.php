@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header"><h5>Visualizar Prioridad</h5></div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-borderless table-striped">
                <thead class="thead-table">
                    <tr>
                        <th>Nombre</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $priority->name }}</th>
                        <th style="background-color:{{ $priority->color ?? '#000000' }}"> </th> 
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Volver a la lista</a>
        </div>

        {{-- <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div> --}}
    </div>
</div>
@endsection