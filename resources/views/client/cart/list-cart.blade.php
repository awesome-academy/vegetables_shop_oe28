<div class="page-cart-single">
    <div class="row">
        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                        <tr class="text-center">
                            <th>{{ trans('clients.image') }}</th>
                            <th>{{ trans('clients.product_name') }}</th>
                            <th>{{ trans('clients.price') }}</th>
                            <th>{{ trans('clients.quantity') }}</th>
                            <th>{{ trans('clients.total') }}</th>
                            <th>{{ trans('clients.update') }}</th>
                            <th>{{ trans('clients.delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (!empty(Session::has('Cart')))
                        @php $cart = Session::get('Cart') @endphp
                        @foreach ($cart->products as $product)
                            <tr class="text-center">
                                <td class="image-prod">
                                    @php $img = $product['productInfo']->images->first(); @endphp
                                    <img class="img-recent" src="{{ asset(config('path-img.img') . $img['image_path']) }}">
                                </td>
                                <td class="product-name">
                                    <h3 class="weight_item" value="{{ $product['productInfo']->weight_item }}">
                                        {{ $product['productInfo']->name . '(' . $product['productInfo']->weight_item . config('path-img.unit') . ')' }}
                                    </h3>
                                </td>
                                <td class="price">
                                    {{ $product['productInfo']->price_discount ? number_format($product['productInfo']->price_discount) : number_format($product['productInfo']->price)  }}
                                </td>
                                <td class="quantity">
                                    <div class="input-number-item">
                                        <span class="minus">-</span>
                                        <input id="quantity-item-{{ $product['productInfo']->id }}" class="number-item"
                                            value="{{ $product['quantity'] }}"/>
                                        <span class="plus">+</span>
                                    </div>
                                </td>
                                <td>
                                    <input type="hidden" id="limitItem-{{ $product['productInfo']->id }}" data-id="{{ $product['productInfo']->id }}"
                                        value="{{ floor($product['productInfo']->weight_available / (float) str_replace(',', '.', $product['productInfo']->weight_item)) }}" />
                                </td>
                                <td class="total">{{ number_format($product['price']) }} {{ config('number-items.unit') }}</td>
                                <td>
                                    <a class="btn btn-success update-number-item" data-id="{{ $product['productInfo']->id }}">{{ trans('clients.update') }}</a>
                                </td>
                                <td class="product-remove"  >
                                    <input type="button" class="product-remove-item" data-id="{{ $product['productInfo']->id }}" value="X" />
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping-checkout">
                <h5>{{ trans('clients.your_cart') }}</h5>
                <ul>
                    <li>{{ trans('clients.total_number') }} <span>{{ @$cart->totalQty }}</span></li>
                    <li>{{ trans('clients.total_price') }} <span>{{ number_format(@$cart->totalPrice) }} {{ config('number-items.unit') }}</span></li>
                </ul>
                <a href="{{ route('client.checkout') }}" class="primary-btn" id="checkout-list">{{ trans('clients.checkout') }}</a>
            </div>
        </div>
    </div>
</div>
