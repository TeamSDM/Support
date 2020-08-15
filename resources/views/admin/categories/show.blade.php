@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Visualizar Categoria</h5>
    </div>

    <div class="card-body">
        <div class="row text-center">
            <div class="col-12 col-md-4 col-sm-12">                
                <div class="shadow rounded p-2">
                    <div class="line-horizontal"><span>ID</span></div>
                    <div class="p-3">{{ $category->id }}</div>         
                </div>
            </div>
            <div class="col-12 col-md-4 col-sm-12">
                <div class="shadow rounded p-2">
                    <div class="line-horizontal">
                        <span>Nombre</span>
                    </div>
                <div class="p-3">
                    {{ $category->name }}
                </div>
            </div>
            </div>
            <div class="col-12 col-md-4 col-sm-12">
               <div class="shadow rounded p-2 ">
                   <div class="line-horizontal">
                       <span>Color</span>
                   </div>
                <div class="p-3">
                    <div style="background-color:{{ $category->color ?? '#000000' }}">
                        <div class="color-size rounded">
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="mb-2">
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                <span>volver al listado</span>
            </a>
        </div>
    </div>
</div>
@endsection