@extends('client.layouts.app')

@section('content')

    <section class="ftco-section">
        <div class="container">
            @include('admin.layouts.common.errors')
            <h3 class="mb-4 billing-heading">{{ trans('clients.billing_details') }}</h3>
            @if (Auth::check())
                @php $user = Auth::user(); @endphp
                <form action="{{ route('client.post_checkout') }}" class="billing-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-7">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">{{ trans('clients.name') }}
                                    <span class="input-require">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                     placeholder="{{ trans('clients.enter_name') }}">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">
                                    {{ trans('clients.address') }}
                                    <span class="input-require">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}"
                                    placeholder="{{ trans('clients.enter_address') }}">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone">
                                    {{ trans('clients.phone') }}
                                    <span class="input-require">{{ config('path-img.require_input') }}</span>
                                </label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"
                                    placeholder="{{ trans('clients.enter_phone') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emailaddress">{{ trans('clients.email') }}</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                                    placeholder="{{ trans('clients.enter_email') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">{{ trans('clients.note') }}</label>
                                <input type="text" name="note" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    @if (!empty(Session::has('Cart')))
                                        @php $cart = Session::get('Cart') @endphp
                                        <h3 class="billing-heading mb-4">{{ trans('clients.cart_total') }}</h3>
                                        <p class="d-flex">
                                            <span>{{ trans('clients.product') }}</span>
                                            <span>{{ trans('clients.total_number') }}</span>
                                            <span>{{ trans('clients.subtotal') }}</span>
                                        </p>
                                        @foreach ($cart->products as $product)
                                            <p class="d-flex">
                                                <span>
                                                    {{ $product['productInfo']->name }}
                                                    {{ '(' . $product['productInfo']->weight_item . ' ' . config('path-img.unit') . ')' }}
                                                </span>
                                                <span>{{ $product['quantity'] }}</span>
                                                <span>
                                                    {{ number_format($product['price']) . config('number-items.unit') }}
                                                </span>
                                            </p>
                                        @endforeach
                                        <p class="d-flex">
                                            <span>{{ trans('clients.delivery') }}</span>
                                            <span></span>
                                        </p>
                                        <p class="d-flex total-price">
                                            <span>{{ trans('clients.total_price') }}</span>
                                            <span>
                                                {{ number_format($cart->totalPrice) . config('number-items.unit') }}
                                            </span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">{{ trans('clients.payment_method') }}</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment_method"
                                                        value="{{ trans('clients.bank_tranfer') }}" class="mr-2">
                                                    {{ trans('clients.bank_tranfer') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="payment_method"
                                                        value="{{ trans('clients.check_payment') }}" class="mr-2">
                                                    {{ trans('clients.check_payment') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <button type="submit" class="btn btn-primary py-3 px-4">
                                            {{ trans('clients.place_an_order') }}
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @else
                <h6>
                    {{ trans('clients.have_account') }}
                    <a href="{{ route('client.get_login') }}">{{ trans('clients.login') }}</a>
                </h6>
                <form action="{{ route('client.post_checkout') }}" class="billing-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname">{{ trans('clients.name') }}
                                        <span class="input-require">{{ config('path-img.require_input') }}</span>
                                    </label>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="{{ trans('clients.enter_name') }}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">
                                        {{ trans('clients.address') }}
                                        <span class="input-require">{{ config('path-img.require_input') }}</span>
                                    </label>
                                    <input type="text" name="address" class="form-control"
                                           placeholder="{{ trans('clients.enter_address') }}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">
                                        {{ trans('clients.phone') }}
                                        <span class="input-require">{{ config('path-img.require_input') }}</span>
                                    </label>
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="{{ trans('clients.enter_phone') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emailaddress">{{ trans('clients.email') }}</label>
                                    <input type="text" name="email" class="form-control"
                                           placeholder="{{ trans('clients.enter_email') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">{{ trans('clients.note') }}</label>
                                    <input type="text" name="note" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row mt-5 pt-3">
                                <div class="col-md-12 d-flex mb-5">
                                    <div class="cart-detail cart-total p-3 p-md-4">
                                        @if (!empty(Session::has('Cart')))
                                            @php $cart = Session::get('Cart') @endphp
                                            <h3 class="billing-heading mb-4">{{ trans('clients.cart_total') }}</h3>
                                            <p class="d-flex">
                                                <span>{{ trans('clients.product') }}</span>
                                                <span>{{ trans('clients.total_number') }}</span>
                                                <span>{{ trans('clients.subtotal') }}</span>
                                            </p>
                                            @foreach ($cart->products as $product)
                                                <p class="d-flex">
                                                <span>
                                                    {{ $product['productInfo']->name }}
                                                    {{ '(' . $product['productInfo']->weight_item . ' ' . $product['productInfo']->unit . ')' }}
                                                </span>
                                                    <span>{{ $product['quantity'] }}</span>
                                                    <span>
                                                    {{ number_format($product['price']) . config('number-items.unit') }}
                                                </span>
                                                </p>
                                            @endforeach
                                            <p class="d-flex">
                                                <span>{{ trans('clients.delivery') }}</span>
                                                <span></span>
                                            </p>
                                            <p class="d-flex total-price">
                                                <span>{{ trans('clients.total_price') }}</span>
                                                <span>
                                                {{ number_format($cart->totalPrice) . config('number-items.unit') }}
                                            </span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-detail p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">{{ trans('clients.payment_method') }}</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment_method"
                                                               value="{{ trans('clients.bank_tranfer') }}" class="mr-2">
                                                        {{ trans('clients.bank_tranfer') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment_method"
                                                               value="{{ trans('clients.check_payment') }}" class="mr-2">
                                                        {{ trans('clients.check_payment') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <button type="submit" class="btn btn-primary py-3 px-4">
                                                {{ trans('clients.place_an_order') }}
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>

@endsection
