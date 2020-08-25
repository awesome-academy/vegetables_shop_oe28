@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_post') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('posts.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                            <tr>
                                <th>{{ trans('templates.id') }}</th>
                                <th>{{ trans('templates.image') }}</th>
                                <th>{{ trans('templates.title') }}</th>
                                <th>{{ trans('templates.category') }}</th>
                                <th>{{ trans('templates.intro') }}</th>
                                <th>{{ trans('templates.edit') }}</th>
                                <th>{{ trans('templates.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>
                                        @php $image = $post->images->first(); @endphp
                                        @if (isset($image))
                                            <img class="img-show" src="{{ asset('img/'. $image['image_path']) }}">
                                        @endif
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $post->category_id) }}">
                                            {{ @$post->category->name }}
                                        </a>
                                    </td>
                                    <td>{{ $post->intro }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="delete-sup" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" value="{{ $post->id }}">
                                                <i class="fa fa-trash">{{ trans('messages.delete') }}</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
