@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            {{ trans('cruds.news.title_singular') }} {{ trans('global.list') }}

            @can('news_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn success-btn" href="{{ route('admin.news.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.news.title_singular') }}
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
                                {{ trans('cruds.news.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.news.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.news.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.news.fields.content') }}
                            </th>
                            <th>
                                {{ trans('cruds.news.fields.images') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newses as $key => $news)
                            <tr data-entry-id="{{ $news->id }}">

                                <td>
                                    {{ $news->id }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($news->date)) }}
                                </td>
                                <td>
                                    {{ $news->title ?? '' }}
                                </td>
                                <td>
                                    {!! $news->content ? substr($news->content, 0, 100) . '  ...more' : '' !!}
                                </td>
                                <td>
                                    @if ($news->newsImages)
                                        <img style="width: 100%; height: 100px; object-fit: contain;"
                                            src="{{ asset('/storage/images/' . $news->newsImages[0]->image) }}"
                                            alt="">
                                    @else
                                    @endif

                                </td>
                                <td>
                                    @can('news_show')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.news.show', $news->id) }}">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    @endcan

                                    @can('news_edit')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.news.edit', $news->id) }}">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                    @endcan

                                    @can('news_delete')
                                        <form id="orderDelete-{{ $news->id }}"
                                            action="{{ route('admin.news.destroy', $news->id) }}" method="POST"
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
            let table = $('.datatable-User:not(.ajaxTable)').DataTable({
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
