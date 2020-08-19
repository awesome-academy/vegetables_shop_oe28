@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('messages.list_suplier') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('supliers.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                        <tr>
                            <th>{{ trans('messages.name') }}</th>
                            <th>{{ trans('messages.address') }}</th>
                            <th>{{ trans('messages.phone') }}</th>
                            <th>{{ trans('messages.email') }}</th>
                            <th>{{ trans('messages.edit') }}</th>
                            <th>{{ trans('messages.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($supliers as $suplier)
                            <tr>
                                <td>{{ $suplier->name }}</td>
                                <td>{{ $suplier->address }}</td>
                                <td>{{ $suplier->phone }}</td>
                                <td>{{ $suplier->email }}</td>
                                <td>
                                    <a href="{{ route('supliers.edit', $suplier->id) }}" class="btn btn-success">
                                        <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                    </a>
                                </td>
                                <td>
                                    <form class="delete-sup" action="{{ route('supliers.destroy', $suplier->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" value="{{ $suplier->id }}">
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
