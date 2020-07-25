<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>prueba</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Ver
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-12 col-md-4 col-sm-12">                
                    <div class="shadow rounded p-2">
                        <div class="line-horizontal">
                            ID
                        </div>
                        <div class="p-3">
                            {{ $category->id }}
                        </div>                    
                    </div>
                </div>
                <div class="col-12 col-md-4 col-sm-12">
                    <div class="shadow rounded p-2">
                        <div class="line-horizontal">
                            Nombre
                        </div>
                    <div class="p-3">
                        {{ $category->name }}
                    </div>
                </div>
                </div>
                <div class="col-12 col-md-4 col-sm-12">
                   <div class="shadow rounded p-2 ">
                       <div class="line-horizontal">
                           Color
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
                    Volver a la lista
                </a>
            </div>
        </div>
    </div>
</body>
</html>