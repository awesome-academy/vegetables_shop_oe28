@extends('admin.layouts.app')
@section('content')

    <h1>{{ trans('templates.infor_order') }}</h1>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container detail-import-bill">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-md-auto">{{ trans('templates.name_customer') }}</th>
                                        <th class="col-md-auto">{{ $order->name }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.phone') }}</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.address') }}</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.payment_method') }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.note') }}</td>
                                        <td>{{ $order->note }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.status') }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.order_date') }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.order_date') }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>{{ trans('templates.total_price') }}</td>
                                        <td>{{ number_format($order->price_order) }} {{ config('number-items.unit') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5>{{ trans('templates.list_product') }}</h5>
                        <table id="myTable" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th class="col-md-auto">{{ trans('templates.product') }}</th>
                                    <th class="col-md-auto">
                                        {{ trans('templates.sub_price') }}
                                    </th>
                                    <th class="col-md-auto">{{ trans('templates.subtotal') }}</th>
                                </tr>
                                @if (isset($products))
                                     @foreach ($products as $key => $product)
                                    <tr role="row">
                                        <th class="col-md-auto">
                                            {{ $product->name . '(' . $product->weight_item . $product->unit . ')' }}
                                        </th>
                                        <th>
                                            @if (isset($product->price_discount))
                                                {{ number_format($product->price_discount) . config('number-items.unit') }}
                                                x {{ $number = $totalPrices[$key]/($product->price_discount) }}
                                            @else
                                                {{ number_format($product->price) . config('number-items.unit') }}
                                                x {{ $number = $totalPrices[$key]/($product->price) }}
                                            @endif
                                        </th>
                                        <th>
                                            {{ number_format($totalPrices[$key]) . config('number-items.unit') }}
                                        </th>
                                     </tr>
                                @endforeach
                                @endif
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
