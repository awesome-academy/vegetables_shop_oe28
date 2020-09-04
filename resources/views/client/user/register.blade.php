@extends('client.layouts.app-post')

@section('content')

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('client.post_register') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        @method('POST')
                        @include('admin.layouts.common.errors')
                        <h4>{{ trans('clients.register') }}</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="{{ trans('clients.username') }}">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="{{ trans('clients.email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password"
                                name="password" placeholder="{{ trans('clients.password') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="re-password"
                                name="re_password" placeholder="{{ trans('clients.re_password') }}">
                            <span id='message'></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{ trans('clients.register') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white">
                        <iframe class="gg-map" src="{{ config('path-img.link_google_map') }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
