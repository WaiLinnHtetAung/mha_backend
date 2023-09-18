@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.news.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.news.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                    <label for="">{{ trans('cruds.news.fields.date') }}</label>
                    <input type="text" class="form-control" name="date" id="date" placeholder="YYYY-MM-DD" value="{{old('date')}}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                    <label for="">{{ trans('cruds.news.fields.title') }}</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-5">
                    <label for="">{{ trans('cruds.news.fields.images') }}</label>
                    <div class="needslick dropzone" id="image-dropzone">

                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                    <label for="">{{ trans('cruds.news.fields.content') }}</label>
                    <textarea name="content" id="" cols="30" rows="10" class="cke-editor" >{{ old('content', '') }}</textarea>
                    @error('content')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

    <script>
        let uploadedImageMap = {}
        Dropzone.options.imageDropzone ={
            url: "{{ route('admin.news.storeMedia') }}",
            maxFilesize: 2,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            success: function(file, response) {

                $('form').append('<input type="hidden" name="images[]" value="'+response.name + '">')
                uploadedImageMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove();
                file.previewElement.remove();
                let name = file.file_name || uploadedImageMap[file.name];
                $('input[name="images[]"][value="' + name + '"]').remove();

                $.ajax({
                    url: "{{ route('admin.news.deleteMedia') }}", // Change this to the appropriate delete route
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        file_name: name
                    },
                    success: function(response) {
                        console.log("File deleted successfully:", response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting file:", error);
                    }
                });
            },
            init: function () {
                @if(isset($project) && $project->document)
                    var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }

        ClassicEditor
            .create( document.querySelector( '.cke-editor' ) )
            .catch( error => {
                console.error( error );
        } )

        $(function () {
            let date = document.querySelector('#date');
            if(date) {
                date.flatpickr({
                    dateFormat: "Y-m-d",
                })
            }
        })
    </script>

@endsection
