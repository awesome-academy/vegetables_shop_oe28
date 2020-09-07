<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                @include('admin.layouts.common.errors')
                <h2 class="mb-0">{{ trans('clients.subscribe') }}</h2>
                <span>{{ trans('clients.message') }}</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="{{ route('client.register_new') }}" class="subscribe-form" method="POST">
                    @csrf
                    <div class="form-group d-flex">
                        <input type="email" class="form-control" name="email" placeholder="{{ trans('clients.enter_email') }}">
                        <input type="submit" class="submit px-3" value="{{ trans('clients.submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
