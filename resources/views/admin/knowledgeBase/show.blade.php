@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header"><h5>Visualizar Conocimiento Categoria</h5></div>

    <div class="card-body">
        <div class="mb-2">
            
            {{ $category->name }}
            
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection