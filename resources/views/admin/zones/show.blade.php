@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.zone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group w-75">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.id') }}
                        </th>
                        <td>
                            {{ $zone->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.name') }}
                        </th>
                        <td>
                            {{ $zone->name }}
                        </td>
                    </tr>
                    @foreach ($zone->sub_zones as $sub_zone)

                    <tr>
                        @if($loop->first)
                                <th rowspan="0">Sub Zones</th>
                        @endif
                        <td>
                            {{$sub_zone->name}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.zones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
