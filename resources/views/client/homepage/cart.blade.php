@if (!empty(Session::has('Cart')))
    @php $cart = Session::get('Cart') @endphp
    @foreach ($cart->products as $product)
        <div class="cart-product">
            <div class="cart-img-product">
                @php $img = $product['productInfo']->images->first(); @endphp
                <img src="{{ asset(config('path-img.img') . $img['image_path']) }}">
            </div>
            <div class="cart-info-product">
                <h4>{{ $product['productInfo']->name }}</h4>
                <div class="cart-product-purchase">
                    @if (isset($product['productInfo']->price_discount))
                        <p class="price">{{ number_format($product['productInfo']->price_discount) }}
                            {{ config('number-items.unit') }} x {{ $product['quantity'] }}</p>
                    @else
                        <p class="price">{{ number_format($product['productInfo']->price) }}
                            {{ config('number-items.unit') }} x {{ $product['quantity'] }}</p>
                    @endif
                </div>
            </div>
            <input type="button" class="remove-item" data-id="{{ $product['productInfo']->id }}" value="X"/>
        </div>
    @endforeach
    <div class="total-info">
        <div class="cart-info">
            <div class="inside-cart">
                <p>{{ trans('clients.total') }}</p>
            </div>
            <div class="total">
                <p class="price">{{ number_format($cart->totalPrice) }} {{ config('number-items.unit') }}</p>
                <input hidden type="number" id="total-qty-cart" value="{{ $cart->totalQty }}">
            </div>
        </div>
        <div class="row cart-check-info">
            <a class="col-md-5 btn btn-warning"
               href="{{ route('client.view_cart') }}">{{ trans('clients.view_cart') }}</a>
        </div>
    </div>
@else
    <p>{{ trans('clients.null_cart') }}</p>
    <p>{{ trans('clients.continue_shop') }}</p>
@endif
