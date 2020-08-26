@extends('client.layouts.app')

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-1')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.frship') }}</h3>
                            <span>{{ trans('clients.free_ship') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-2')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.alway_fresh') }}</h3>
                            <span>{{ trans('clients.product_well') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-3')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.superior') }}</h3>
                            <span>{{ trans('clients.quality') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-4')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.support') }}</h3>
                            <span>{{ trans('clients.24_7') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex img-fruits img-category">
                                <div class="text text-center">
                                    <h2>{{ trans('clients.vegetables') }}</h2>
                                    <p>{{ trans('clients.protect_home') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end img-fruits">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">{{ trans('clients.fruits') }}</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end img-vegetable">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">{{ trans('clients.vegetable') }}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end img-dried">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">{{ trans('clients.dried') }}</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end img-other-vege">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">{{ trans('clients.other_vegefood') }}</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">{{ trans('clients.featured_product') }}</span>
                    <p>{{ trans('clients.clean_food') }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod">
                            @php $image = $product->images->first() @endphp
                            <img class="img-fluid" src="{{ asset('img/'. $image['image_path']) }}"
                                 alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3>
                                <a href="#">{{ $product->name }}</a>
                            </h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        @if (isset($product->price_discount))
                                            <span class="mr-2 price-dc">{{ $product->price }} đ</span>
                                        @endif
                                        <span class="price-sale">
                                            {{ $product->price_discount ? $product->price_discount : $product->price }} đ
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
