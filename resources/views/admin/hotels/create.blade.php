@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hotel.title_singular') }}
        ({{$zoneName}} Zone)
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hotels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row my-4">
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.name') }}</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.owner') }}</label>
                    <input type="text" class="form-control" name="owner" value="{{old('owner')}}">
                    @error('owner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.image') }}</label><span>img</span>
                    <input type="file" class="form-control" name="image" value="{{old('image')}}">

                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.sr_no') }}</label>
                    <input type="text" class="form-control" name="sr_no" value="{{old('sr_no')}}">
                    @error('sr_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.total_room') }}</label>
                    <input type="number" class="form-control" name="total_room" value="{{old('total_room')}}">
                    @error('total_room')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.phone') }}</label>
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.email') }}</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.web_link') }}</label>
                    <input type="text" class="form-control" name="web_link" value="{{old('web_link')}}">
                    @error('web_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.sub_zone_name') }}</label>
                    <select name="sub_zone_id" id="sub_zone_id" class="form-control select2">
                        <option value="">Choose Sub Zone</option>
                        @foreach ($sub_zones as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('sub_zone_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.zone_name') }}</label>
                    <select name="zone_id" id="zone_id" class="form-control select2">
                        <option value="">Choose Zone</option>
                        @foreach ($zones as $key=>$value)
                            <option value="{{$key}}" {{$key == old('zone_id') ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                    </select>
                    @error('zone_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.hotel.fields.address') }}</label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="5">{{ old('address') }}</textarea>
                    @error('address')
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
    $('document').ready(function() {
        let zoneName = {!! json_encode($zoneName) !!};

        // for auto select zone select base on zonename
        $.ajax({
            type: 'POST',
            url : "{{ route('admin.zone.select') }}",
            data: {
                zoneName: zoneName,
                _token: "{{csrf_token()}}",
            },
            success: function(response) {
                $('#zone_id').html(response.option)
            }
        })


        // for auto select sub_zone based on zonename
        if(zoneName !== 'All') {
            $.ajax({
                type: 'POST',
                url: "{{route('admin.subzone.select')}}",
                data: {
                    zoneName: zoneName,
                    _token: "{{csrf_token()}}",
                },
                success: function(response) {
                    $('#sub_zone_id').html(response.option);
                }
            })
        }
    })
</script>

@endsection
