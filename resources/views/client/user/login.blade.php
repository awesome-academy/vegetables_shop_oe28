@extends('client.layouts.app-post')

@section('content')

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ route('client.post_login') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        @method('POST')
                        @if (session()->has('login_fail'))
                            <div class="alert alert-danger">
                                {{ session()->get('login_fail') }}
                            </div>
                        @endif
                        <h4>{{ trans('clients.login') }}</h4>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="{{ trans('clients.email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password"
                                name="password" placeholder="{{ trans('clients.password') }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="{{ trans('clients.login') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
