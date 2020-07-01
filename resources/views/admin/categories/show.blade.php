@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="row text-center">
            <div class="col-12 col-md-4 col-sm-12">                
                <div class="shadow rounded p-2">
                    <div class="line-horizontal">
                        {{ trans('cruds.category.fields.id') }}
                    </div>
                    <div class="p-3">
                        {{ $category->id }}
                    </div>                    
                </div>
            </div>
            <div class="col-12 col-md-4 col-sm-12">
                <div class="shadow rounded p-2">
                    <div class="line-horizontal">
                        {{ trans('cruds.category.fields.name') }}
                    </div>
                <div class="p-3">
                    {{ $category->name }}
                </div>
            </div>
            </div>
            <div class="col-12 col-md-4 col-sm-12">
               <div class="shadow rounded p-2 ">
                   <div class="line-horizontal">
                       {{ trans('cruds.category.fields.color') }}
                   </div>
                <div class="p-3">
                    <div style="background-color:{{ $category->color ?? '#FFFFFF' }}">
                        <div class="color-size rounded">
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="mb-2">
            {{-- <table class="table table-bordered table-striped">
                <tbody> --}}
                    {{-- <tr>
                        <th class="thead-table">
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr> --}}
                        {{-- <th class="thead-table">
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead-table">
                            {{ trans('cruds.category.fields.color') }}
                        </th>
                        <td style="background-color:{{ $category->color ?? '#FFFFFF' }}"></td>
                    </tr>
                </tbody>
            </table> --}}
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        {{-- <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav> --}}
        {{-- <div class="tab-content">

        </div> --}}
    </div>
</div>
@endsection