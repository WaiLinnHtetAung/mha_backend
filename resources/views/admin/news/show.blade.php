@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.news.title') }}
    </div>

    <div class="card-body">
        <div class="form-group w-75">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.id') }}
                        </th>
                        <td>
                            {{ $news->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.images') }}
                        </th>
                        <td>
                            @foreach ($news->newsImages as $newsImage)
                            <img style="width: 100px; height: 100px; object-fit: contain;" src="{{ asset('/storage/images/'.$newsImage->image) }}" alt="">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.date') }}
                        </th>
                        <td>
                            {{ date('d-m-Y', strtotime($news->date)) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.title') }}
                        </th>
                        <td>
                            {{ $news->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.content') }}
                        </th>
                        <td>
                            {!! $news->content !!}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group mt-3">
                <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
