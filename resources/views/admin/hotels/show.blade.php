@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hotel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group w-75">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center">
                            @if(isset($hotel->image))
                                <img style="width: 50%; height: 300px; object-fit:contain;" src="{{asset('storage/images/'.$hotel->image)}}" alt="">
                            @else
                                <img style="width: 100%; height: 200px; object-fit: contain;" src="{{asset('storage/default.jpg')}}" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.name')}}
                        </th>
                        <td>
                            {{$hotel->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.owner')}}
                        </th>
                        <td>
                            {{$hotel->owner}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.sr_no')}}
                        </th>
                        <td>
                            {{$hotel->sr_no}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.total_room')}}
                        </th>
                        <td>
                            {{$hotel->total_room}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.phone')}}
                        </th>
                        <td>
                            {{$hotel->phone}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.email')}}
                        </th>
                        <td>
                            {{$hotel->email}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.address')}}
                        </th>
                        <td>
                            {{$hotel->address}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.web_link')}}
                        </th>
                        <td>
                            {{$hotel->web_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.sub_zone_name')}}
                        </th>
                        <td>
                            {{$hotel->sub_zone ? $hotel->sub_zone->name : ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{trans('cruds.hotel.fields.zone_name')}}
                        </th>
                        <td>
                            {{$hotel->zone->name}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.hotels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
