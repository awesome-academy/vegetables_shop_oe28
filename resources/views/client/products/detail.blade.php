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
                            /{{ $product->weight_item . config('path-img.unit') }}
                        </div>
                        <p>{{ $product->description }}</p>
                        @if ($product->weight_available <= config('number-items.zero'))
                            <div class="w-100 out-stock">{{ trans('clients.out_stock') }}</div>
                        @else
                            <div class="col-md-12">
                                <p class="weight_available">{{ $product->weight_available . " " . config('path-img.unit') . " " . trans('clients.available') }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($product->weight_available > config('number-items.zero'))
                        <p>
                            <a href="javascript:" id="{{ $product->id }}" class="btn btn-black py-3 px-5 add-to-cart">
                                {{ trans('clients.add_to_cart') }}
                            </a>
                        </p>
                    @else
                        <p>
                            <a href="javascript:" id="{{ $product->id }}" class="btn btn-black py-3 px-5 disabled">
                                {{ trans('clients.add_to_cart') }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            <label class="review-product">{{ trans('clients.review') }}</label>
            <div class="form-group">
                <form action="{{ route('client.rate') }}" class="form-group" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="comment">{{ trans('clients.rate') }}</label>
                    <div class='rating-stars text-center row'>
                        <div class="rate">
                            <input type="radio" id="star5" name="rating" value="{{ config('number-items.five') }}"/>
                            <label for="star5">{{ trans('clients.5_stars') }}</label>
                            <input type="radio" id="star4" name="rating" value="{{ config('number-items.four') }}"/>
                            <label for="star4">{{ trans('clients.4_stars') }}</label>
                            <input type="radio" id="star3" name="rating" value="{{ config('number-items.three') }}"/>
                            <label for="star3">{{ trans('clients.3_stars') }}</label>
                            <input type="radio" id="star2" name="rating" value="{{ config('number-items.two') }}"/>
                            <label for="star2">{{ trans('clients.2_stars') }}</label>
                            <input type="radio" id="star1" name="rating" value="{{ config('number-items.one') }}"/>
                            <label for="star1">{{ trans('clients.1_stars') }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">{{ trans('clients.comment') }}</label>
                        <textarea rows="{{ config('number-items.five') }}" name="content" id="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success send-review">{{ trans('clients.submit') }}</button>
                </form>
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
                @if (isset($productRelates))
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
                                    <a href="#">{{ $relate->name . '(' . $relate->weight_item . config('path-img.unit') . ')' }}</a>
                                </h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            @if (isset($relate->price_discount))
                                                <span class="mr-2 price-dc">{{ number_format($relate->price) }}</span>
                                                <span class="price-sale">
                                                    {{ number_format($relate->price_discount) }}
                                                    {{ config('number-items.unit') }}
                                                </span>
                                            @else
                                                <span class="price-sale">
                                                    {{ number_format($relate->price) }}
                                                    {{ config('number-items.unit') }}
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        @if ($relate->weight_available > 0)
                                            <a href="javascript:" id="{{ $relate->id }}"
                                                class="buy-now d-flex justify-content-center align-items-center mx-1 add-to-cart">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        @else
                                            <a href="javascript:" id="{{ $relate->id }}"
                                               class="buy-now d-flex justify-content-center align-items-center mx-1 disabled">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        @endif
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
