<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }}
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

                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</body>
</html>