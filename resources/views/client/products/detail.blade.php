@extends('client.layouts.app')

@section('content')

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @php $imgs = $product->images; @endphp
                            <img class="product__details__pic__item--large"
                                src="{{ asset(config('path-img.img') . $imgs->first()['image_path']) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product__details__pic__slider owl-carousel owl-loaded owl-drag">
                            <div class="owl-slider">
                                <div id="carousel" class="owl-carousel">
                                    @foreach ($imgs as $img)
                                        <div class="item">
                                            <img class="owl-lazy" data-src="{{ asset(config('path-img.img') . $img['image_path']) }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__rating">
                            @for ($i = 0; $i < $rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>{{ '(' . $countRate . ' ' . trans('clients.review') . ')' }}</span>
                        </div>
                        <div class="product__details__price">
                            {{ ($product->price_discount) ? number_format($product->price_discount) : number_format($product->price) }}
                            {{ config('number-items.unit') }}
                        </div>
                        <p>{{ $product->description }}</p>
                        <div class="w-100">{{ $product->weight_available . ' ' . $product->unit . ' '. trans('clients.available') }} </div>
                    </div>
                    <p>
                        <a href="javascript:" id="{{ $product->id }}" class="btn btn-black py-3 px-5 add-to-cart">
                            {{ trans('clients.add_to_cart') }}
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">
                                    {{ trans('clients.review') }}
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">{{ trans('clients.product') }}</span>
                    <h2 class="mb-4">{{ trans('clients.relate_product') }}</h2>
                    <p>{{ trans('clients.clean_food') }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($productRelates as $relate)
                    <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="product">
                        <a href="{{ route('client.product_detail', $relate->id) }}" class="img-prod">
                            @php $image = $relate->images->first(); @endphp
                            <img class="img-fluid" src="{{ asset(config('path-img.img') . $image['image_path']) }}">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3>
                                <a href="#">{{ $relate->name . '(' . $relate->weight_item . $relate->unit . ')' }}</a>
                            </h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        @if (isset($relate->price_discount))
                                            <span class="mr-2 price-dc">{{ number_format($relate->price) }}</span>
                                            <span class="price-sale">{{ number_format($relate->price_discount) }}</span>
                                        @else
                                            <span class="price-sale">{{ number_format($relate->price) }}</span>
                                            {{ config('number-items.unit') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="javascript:" id="{{ $relate->id }}"
                                        class="buy-now d-flex justify-content-center align-items-center mx-1 add-to-cart">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
