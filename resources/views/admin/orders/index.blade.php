@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('templates.list_product') }}</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <a class="btn btn-primary btnAdd" href="{{ route('products.create') }}">
                            <i class="fa fa-plus">{{ trans('templates.add_new') }}</i>
                        </a>
                        <thead>
                            <tr>
                                <th>{{ trans('templates.id') }}</th>
                                <th>{{ trans('templates.name_client') }}</th>
                                <th>{{ trans('templates.phone') }}</th>
                                <th>{{ trans('templates.address') }}</th>
                                <th>{{ trans('templates.order_date') }}</th>
                                <th>{{ trans('templates.status') }}</th>
                                <th>{{ trans('templates.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->updated_at }}</td>
                                @if ((int) $order->status == config('number-items.one'))
                                    <td class="btn btn-danger">{{ trans('templates.reject') }}</td>
                                @elseif ((int) $order->status == config('number-items.two'))
                                    <td class="btn btn-warning">{{ trans('templates.pending') }}</td>
                                @else
                                    <td class="btn btn-success">{{ trans('templates.deliveried') }}</td>
                                @endif
                                    <td>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-warning">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
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
