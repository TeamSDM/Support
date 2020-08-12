@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12 col-md-3 col-sm-12"></div>
    <div class="col-12 col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header"><h5>Crear Base de conocimiento</h5></div>
            <div class="card-body">
                <select name="" id="">
                    <option value="">Seleccionar...</option>
                    <option value="1">Base de conocimiento</option>
                    <option value="2">Manual</option>
                </select>
                {{-- formulario para base de conocimeinto --}}
                {{-- <form action="{{ route("admin.priorities.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($knowledge) ? $knowledge->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.knowledge.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                        <label for="color">Color</label>
                        <input type="text" id="color" name="color" class="form-control colorpicker" value="{{ old('color', isset($knowledge) ? $knowledge->color : '') }}">
                        @if($errors->has('color'))
                            <em class="invalid-feedback">
                                {{ $errors->first('color') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.knowledge.fields.color_helper') }}
                        </p>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-info" type="submit" value="Guardar">
                    </div>
                </form> --}}
                {{-- Formulario para manual --}}
                <form action="{{ route("admin.knowledgebase.store") }}">
                    @csrf
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($knowledge) ? $knowledge->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block"></p>
                    </div>
                    <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                        <label for="attachments">Archivo</label>
                        <div class="needsclick dropzone" id="attachments-dropzone"></div>
                        @if($errors->has('attachments'))
                            <em class="invalid-feedback">
                                {{ $errors->first('attachments') }}
                            </em>
                        @endif
                        <p class="helper-block"></p>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-info" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 col-sm-12"></div>
</div>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();
    var uploadedAttachmentsMap = {}
    Dropzone.options.attachmentsDropzone = {
        url: '{{ route('admin.knowledgebase.storeMedia') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 2
        },
        success: function (file, response) {
        $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
        uploadedAttachmentsMap[file.name] = response.name
        },
        removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedAttachmentsMap[file.name]
        }
        $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($knowledgebase) && $knowledgebase->attachments)
          var files =
            {!! json_encode($knowledgebase->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection