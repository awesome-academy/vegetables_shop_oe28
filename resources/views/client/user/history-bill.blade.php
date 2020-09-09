@extends('client.layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="page-cart-single">
                <div class="row">
                    <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>{{ trans('clients.id') }}</th>
                                    <th>{{ trans('clients.order_date') }}</th>
                                    <th>{{ trans('clients.product_name') }}</th>
                                    <th>{{ trans('clients.total_price') }}</th>
                                    <th>{{ trans('clients.status') }}</th>
                                    <th>{{ trans('clients.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $key => $orderItem)
                                        <tr class="text-center">
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($orderItem->first()->created_at)) }}
                                            </td>
                                            <td>
                                                @foreach ($orderItem as $item)
                                                    @php $product = $item->product @endphp
                                                    <li class="name-product-bill">{{ $product->name }}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($orderItem as $item)
                                                    <li class="name-product-bill">
                                                        {{ number_format($item->total_price) }}
                                                        {{ config('number-items.unit') }}
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ((int) $orders[$key-1]->status == config('number-items.one'))
                                                    {{ trans('templates.reject') }}
                                                @elseif ((int) $orders[$key-1]->status == config('number-items.two'))
                                                    {{ trans('templates.pending') }}
                                                @else
                                                    {{ trans('templates.deliveried') }}
                                                @endif
                                            </td>
                                            @if ((int) $orders[$key-1]->status == config('number-items.two'))
                                                <td>
                                                    <form class="delete-sup" action="{{ route('client.delete_bill', $orders[$key-1]->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $orders[$key-1]->id }}" name="delete_id">
                                                        <button class="btn btn-danger delete-bill" type="submit">
                                                            <i class="fa fa-trash">{{ trans('messages.delete') }}</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
