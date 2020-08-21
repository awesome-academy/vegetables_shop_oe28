@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_category') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('categories.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                        <tr>
                            <th>{{ trans('templates.id') }}</th>
                            <th>{{ trans('templates.name') }}</th>
                            <th>{{ trans('templates.parent_id') }}</th>
                            <th>{{ trans('templates.level') }}</th>
                            <th>{{ trans('messages.edit') }}</th>
                            <th>{{ trans('messages.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->categoryParent)
                                        {{ $category->categoryParent->name }}
                                    @else
                                        {{ $category->name }}
                                    @endif
                                </td>
                                <td>{{ $category->level }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete-sup" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" value="{{ $category->id }}">
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
