@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_import_bill') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <a class="btn btn-primary btnAdd" href="{{ route('import-bills.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                            <tr>
                                <th>{{ trans('templates.id') }}</th>
                                <th>{{ trans('templates.supplier') }}</th>
                                <th>{{ trans('templates.import_date') }}</th>
                                <th>{{ trans('templates.detail') }}</th>
                                <th>{{ trans('templates.edit') }}</th>
                                <th>{{ trans('templates.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($importBills as $key => $importBill)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>
                                        <a href="{{ route('supliers.edit', @$importBill->suplier_id) }}">
                                            {{ @$importBill->supplier->name }}
                                        </a>
                                    </td>
                                    <td>{{ $importBill->import_date }}</td>
                                    <td>
                                        <a href="{{ route('import-bills.show', $importBill->id) }}" class="btn btn-warning">
                                            <i class="fa fa-info-circle">{{ trans('templates.detail') }}</i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('import-bills.edit', $importBill->id) }}" class="btn btn-success">
                                            <i class="fa fa-edit">{{ trans('messages.edit') }}</i>
                                        </a>
                                    </td>
                                    <td>
                                        <form class="delete-sup" action="{{ route('import-bills.destroy', $importBill->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" value="{{ $importBill->id }}">
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
