@extends('client.layouts.app-post')

@section('content')

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                    <form action="{{ route('client.post_profile') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        @method('POST')
                        @include('admin.layouts.common.errors')
                        <h4>{{ trans('clients.profile') }}</h4>
                        @php $user = Auth::user(); @endphp
                        <div class="form-row form-group">
                            <div class="col">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    placeholder="{{ trans('clients.username') }}">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    placeholder="{{ trans('clients.email') }}">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <input type="password" class="form-control" name="password"
                                    placeholder="{{ trans('clients.password') }}">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" name="re_password"
                                    placeholder="{{ trans('clients.re_password') }}">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                    placeholder="{{ trans('clients.phone') }}">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="address" value="{{ $user->address }}"
                                    placeholder="{{ trans('clients.address') }}">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <input type="submit" value="{{ trans('clients.update') }}" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
