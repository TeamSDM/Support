@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header"><h5>Visualizar Permiso</h5></div>
            <div class="card-body">
                <div class="mb-2">
                    <table class="table table-borderless table-striped">
                        <thead class="thead-table">
                            <tr><th>Título</th></tr>
                        </thead>
                        <tbody>
                            <tr><th>{{ $permission->title }}</th></tr>
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
    </div>
    <div class="col-12 col-md-3 col-sm-12"></div>
</div>
@endsection