@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="custom-header">
        {{ trans('cruds.zone.title_singular') }} {{ trans('global.list') }}

        @can('zone_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn success-btn" href="{{ route('admin.zones.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.zone.title_singular') }}
                    </a>
                </div>
            </div>
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.zone.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.zone.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($zones as $key => $zone)
                        <tr data-entry-id="{{ $zone->id }}">

                            <td>
                                {{ $zone->id }}
                            </td>
                            <td>
                                {{ $zone->name ?? '' }}
                            </td>
                            <td>
                                @can('zone_show')
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        href="{{ route('admin.zones.show', $zone->id) }}">
                                        <i class='bx bx-show'></i>
                                    </a>
                                @endcan

                                @can('zone_edit')
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        href="{{ route('admin.zones.edit', $zone->id) }}">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                @endcan

                                @can('zone_delete')
                                    <form id="orderDelete-{{ $zone->id }}"
                                        action="{{ route('admin.zones.destroy', $zone->id) }}" method="POST"
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
