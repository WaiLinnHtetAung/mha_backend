@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="custom-header">
        {{ trans('cruds.sub_zone.title_singular') }} {{ trans('global.list') }}

        @can('sub_zone_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn success-btn" href="{{ route('admin.sub_zones.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.sub_zone.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User mb-3">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_zone.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sub_zone.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.sub_zone.fields.zone_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subZones as $key => $sub_zone)
                        <tr data-entry-id="{{ $sub_zone->id }}">

                            <td>
                                {{ $sub_zone->id }}
                            </td>
                            <td>
                                {{ $sub_zone->name ?? '' }}
                            </td>
                            <td>
                                {{ $sub_zone->zone->name ?? '' }}
                            </td>
                            <td>
                                @can('sub_zone_show')
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        href="{{ route('admin.sub_zones.show', $sub_zone->id) }}">
                                        <i class='bx bx-show'></i>
                                    </a>
                                @endcan

                                @can('sub_zone_edit')
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        href="{{ route('admin.sub_zones.edit', $sub_zone->id) }}">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                @endcan

                                @can('sub_zone_delete')
                                    <form id="orderDelete-{{ $sub_zone->id }}"
                                        action="{{ route('admin.sub_zones.destroy', $sub_zone->id) }}" method="POST"
                                        style="display: inline-block;" onsubmit="return showConfirmation()">
                                        @csrf
                                        @method('delete')
                                        <button onclick="event.preventdefault()"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                            class=" p-0 glow">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-end">
                {!! $subZones->links() !!}
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script>
    function showConfirmation() {
    if (confirm('Are you sure you want to submit the form?')) {
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
