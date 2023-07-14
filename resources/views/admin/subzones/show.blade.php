@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sub_zone.title') }}
    </div>

    <div class="card-body">
        <div class="form-group w-50">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_zone.fields.id') }}
                        </th>
                        <td>
                            {{ $sub_zone->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_zone.fields.name') }}
                        </th>
                        <td>
                            {{ $sub_zone->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_zone.fields.zone_name') }}
                        </th>
                        <td>
                            {{ $sub_zone->zone->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.sub_zones.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
