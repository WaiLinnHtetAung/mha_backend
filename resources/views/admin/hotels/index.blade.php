@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            {{-- <span style="color: #eb9c00; font-weight:bold;">{{ isset($zoneName) ? $zoneName.' Hotels' : trans('cruds.hotel.title') }} {{ trans('global.list') }} </span> --}}
            @if (isset($zoneName))
                <div><span style="color: #eb9c00; font-weight:bold; font-size: 17px;">{{ $zoneName }}</span> Hotels List
                </div>
            @endif

            <div style="font-weight: bold; color: rgb(21, 94, 190);">Total - {{ count($hotels) }}</div>

            @can('hotel_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn success-btn" href="{{ route('admin.hotels.create') }}?zone={{ $zoneName }}">
                            {{ trans('global.add') }} {{ trans('cruds.hotel.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Hotel">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.hotel.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.hotel.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.hotel.fields.owner') }}
                            </th>
                            <th>
                                {{ trans('cruds.hotel.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.hotel.fields.sr_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.hotel.fields.phone') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotels as $key => $hotel)
                            <tr data-entry-id="{{ $hotel->id }}">

                                <td>
                                    {{ $hotel->id }}
                                </td>
                                <td>
                                    {{ $hotel->name ?? '' }}
                                </td>
                                <td>
                                    {{ $hotel->owner ?? '' }}
                                </td>
                                <td>
                                    @if (isset($hotel->image))
                                        <img style="width: 100%; height: 100px; object-fit: contain;"
                                            src="{{ asset('storage/images/' . $hotel->image) }}" alt="">
                                    @else
                                        <img style="width: 100%; height: 100px; object-fit: contain;"
                                            src="{{ asset('storage/default.jpg') }}" alt="">
                                    @endif
                                </td>
                                <td>
                                    {{ $hotel->sr_no ?? '' }}
                                </td>
                                <td>
                                    {{ $hotel->phone ?? '' }}
                                </td>
                                <td class="text-nowrap">
                                    @can('hotel_show')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.hotels.show', $hotel->id) }}">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    @endcan

                                    @can('hotel_edit')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.hotels.edit', $hotel->id) }}">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                    @endcan

                                    @can('hotel_delete')
                                        <form id="orderDelete-{{ $hotel->id }}"
                                            action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST"
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-Hotel:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

        function showConfirmation() {
            if (confirm('Are you sure you want to submit the form?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
