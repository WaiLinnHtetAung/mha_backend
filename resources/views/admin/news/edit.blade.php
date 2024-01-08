@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.news.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.news.update', [$news->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row my-3">
                    <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                        <label for="">{{ trans('cruds.news.fields.date') }}</label>
                        <input type="text" class="form-control" name="date" id="date" placeholder="YYYY-MM-DD"
                            value="{{ old('date', $news->date) }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                        <label for="">{{ trans('cruds.news.fields.title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $news->title) }}">
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
                        <textarea name="content" id="" cols="30" rows="10" class="cke-editor">{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
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
        Dropzone.options.imageDropzone = {
            url: "{{ route('admin.news.storeMedia') }}",
            maxFilesize: 10,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {

                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedImageMap[file.name] = response.name
            },
            removedfile: function(file) {
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
            init: function() {
                @if (isset($news) && $news->newsImages)
                    var files = {!! json_encode($news->newsImages) !!}
                    var server_url = "{{ url('/storage/images/') }}";

                    for (var i in files) {
                        var file = {
                            name: files[i].image,
                            size: files[i].size,
                            accepted: true
                        };

                        this.files.push(file); // Add the file to Dropzone's files array
                        this.emit("addedfile", file); // Emit the "addedfile" event
                        this.emit("thumbnail", file, server_url + '/' + files[i]
                            .image); // Emit the "thumbnail" event
                        this.emit("complete", file); // Emit the "complete" event

                        $('form').append('<input type="hidden" name="images[]" value="' + files[i].image + '">')
                        uploadedImageMap[file.name] = files[i].image

                        // Adjust thumbnail image styles to fit within a container
                        var thumbnailElement = this.files[i].previewElement.querySelector(".dz-image img");
                        thumbnailElement.style.maxWidth = "100%";
                        thumbnailElement.style.height = "auto";
                    }
                @endif

            },


        }

        ClassicEditor
            .create(document.querySelector('.cke-editor'))
            .catch(error => {
                console.error(error);
            })

        $(function() {
            let date = document.querySelector('#date');
            if (date) {
                date.flatpickr({
                    dateFormat: "Y-m-d",
                })
            }
        })
    </script>
@endsection
