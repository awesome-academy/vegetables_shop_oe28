<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{ config('foot.phone') }}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">{{ config('foot.email') }}</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">{{ config('foot.free_ship') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <a class="navbar-brand" href="{{ route('client.homepage') }}">{{ trans('clients.name_website') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false">
            <span class="oi oi-menu"></span> {{ trans('clients.menu') }}
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('client.homepage') }}" class="nav-link active">{{ trans('clients.home') }}</a></li>
                <li class="nav-item">
                    <a href="{{ route('client.all_product') }}" class="nav-link">
                        {{ trans('clients.product') }}
                    </a>
                </li>
                <li class="nav-item"><a href="{{ route('client.post_index') }}" class="nav-link">{{ trans('clients.news') }}</a></li>
                <li class="nav-item"><a href="{{ route('client.introduce') }}" class="nav-link">{{ trans('clients.introduce') }}</a></li>
                <li class="nav-item"><a href="{{ route('client.delivery') }}" class="nav-link">{{ trans('clients.delivery_regulations') }}</a></li>
                <li class="nav-item">
                    <a href="{{ route('client.delivery') }}" class="nav-link">
                        <span class="fa fa-heart"></span>
                        <sup>1</sup>
                    </a>
                </li>
                <li class="nav-item nav-cart">
                    @if (!empty(Session::has('Cart')))
                        <a href="#" class="nav-link">
                            <i class='fa fa-shopping-cart'>
                                <sup id="total-qty-show">{{ Session::get('Cart')->totalQty }}</sup>
                            </i>
                        </a>
                    @else
                        <a href="#" class="nav-link">
                             <i class='fa fa-shopping-cart'><sup id="total-qty-show">{{ config('number-items.zero') }}</sup></i>
                        </a>
                    @endif
                    <ul class="item-cart">
                        <span class="title-cart">{{ trans('clients.your_cart') }}</span>
                        <li class="cart-area">
                            <div id="change-item-cart">
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
                                                <input type="button" class="remove-item"
                                                    data-id="{{ $product['productInfo']->id }}" value="X"/>
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
                                            <a class="col-md-5 btn btn-warning" href="{{ route('client.view_cart') }}">
                                                {{ trans('clients.view_cart') }}
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p>{{ trans('clients.null_cart') }}</p>
                                    <p>{{ trans('clients.continue_shop') }}</p>
                                @endif
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item user-regis-pa">
                    <a href="#" class="nav-link">
                        <i class='fas fa-user-alt'></i>
                    </a>
                    @if (Auth::check())
                        <ul class="reg-log">
                            <li>
                                <a href="{{ route('client.get_profile') }}">{{ trans('clients.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('client.get_logout') }}">{{ trans('clients.logout') }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="reg-log">
                            <li>
                                <a href="{{ route('client.register') }}">{{ trans('clients.register') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('client.get_login') }}">{{ trans('clients.login') }}</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="nav-item">
                    @php $locale = session()->get('locale') @endphp
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        @switch ($locale)
                            @case ('en')
                            <img src="{{ asset(config('path-img.en')) }}" class="img-lang">
                            {{ trans('clients.english') }}
                            @break
                            @case ('vi')
                            <img src="{{ asset(config('path-img.vn')) }}" class="img-lang">
                            {{ trans('clients.vietnam') }}
                            @break
                        @endswitch
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('lang', ['locale' => 'en']) }}">
                            <img src="{{ asset(config('path-img.en')) }}" class="img-lang">
                            {{ trans('clients.english') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('lang', ['locale' => 'vi']) }}">
                            <img src="{{ asset(config('path-img.vn')) }}" class="img-lang">
                            {{ trans('clients.vietnam') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
