@extends('client.layouts.app')

@section('content')

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item slider-img-1">
                <div class="overlay"></div>
            </div>
            <div class="slider-item slider-img-2">
                <div class="overlay"></div>
            </div>
            <div class="slider-item slider-img-3">
                <div class="overlay"></div>
            </div>
        </div>
    </section>

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
                            <h3 class="heading">{{ trans('clients.frship') }}</h3>
                            <span>{{ trans('clients.free_ship') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-3')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.frship') }}</h3>
                            <span>{{ trans('clients.free_ship') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <img src="{{ asset(config('path-img.poly-4')) }}" alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="heading">{{ trans('clients.frship') }}</h3>
                            <span>{{ trans('clients.free_ship') }}</span>
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
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex">
                                <div class="text text-center">
                                    <h2>{{ trans('clients.vegetables') }}</h2>
                                    <p></p>
                                    <p><a href="#" class="btn btn-primary">{{ trans('clients.shop_now') }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">{{ trans('clients.fruits') }}</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">{{ trans('clients.vegetable') }}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">{{ trans('clients.juice') }}</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">{{ trans('clients.dried') }}</a></h2>
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
                    <span class="subheading">{{ trans('clients.feature') }}</span>
                    <h2 class="mb-4">{{ trans('clients.our_product') }}</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod">
                            <img class="img-fluid" src="#" alt="Colorlib Template">
                            <span class="status"></span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#"></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        <span class="mr-2 price-dc"></span>
                                        <span class="price-sale"></span>
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
            </div>
        </div>
    </section>

@endsection
