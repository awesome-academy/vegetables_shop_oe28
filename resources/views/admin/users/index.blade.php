@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_user') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('users.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                        <tr>
                            <th>{{ trans('messages.id') }}</th>
                            <th>{{ trans('messages.name') }}</th>
                            <th>{{ trans('messages.email') }}</th>
                            <th>{{ trans('messages.phone') }}</th>
                            <th>{{ trans('messages.address') }}</th>
                            <th>{{ trans('messages.edit') }}</th>
                            <th>{{ trans('messages.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete-sup" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" value="{{ $user->id }}">
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
