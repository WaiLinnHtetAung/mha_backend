@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sub_zone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub_zones.update", [$sub_zone->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label class="required" for="name">{{ trans('cruds.sub_zone.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $sub_zone->name) }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="col-lg-4 col-md-6 form-group">
                    <label for="">{{ trans('cruds.sub_zone.fields.zone_name') }}</label>
                    <select name="zone_id" id="" class="form-control select2">
                        <option value="">Choose Zone Name</option>
                        @foreach ($zones as $key=>$value)
                            <option value="{{$key}}" {{ $key == old('zone_id') || $key == $sub_zone->zone_id ? 'selected' : '' }}>{{$value}}</option>
                        @endforeach
                    </select>
                    @error('zone_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
