@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sub_zone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub_zones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.sub_zone.fields.name') }}</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                    <label for="">{{ trans('cruds.sub_zone.fields.zone_name') }}</label>
                    <select name="zone_id" id="" class="form-control select2">
                        <option value="">Choose Zone Name</option>
                        @foreach ($zones as $key=>$value)
                            <option value="{{$key}}" {{ $key == old('zone_id') ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                    @error('zone_id')
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
