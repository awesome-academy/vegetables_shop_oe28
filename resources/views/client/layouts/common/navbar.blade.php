<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">{{ trans('clients.name_website') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{ trans('clients.menu') }}
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('homepage') }}" class="nav-link">{{ trans('clients.home') }}</a></li>
                <li class="nav-item user-regis-pa">
                    <a href="{{ route('allProduct') }}" class="nav-link">
                        {{ trans('clients.product') }}
                    </a>
                </li>
                <li class="nav-item"><a href="{{ route('postIndex') }}" class="nav-link">{{ trans('clients.news') }}</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">{{ trans('clients.introduce') }}</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">{{ trans('clients.delivery_regulations') }}</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="cart.html" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                    </a>
                </li>
                <li class="nav-item user-regis-pa">
                    <a href="#" class="nav-link">
                        <i class='fas fa-user-alt'></i>
                    </a>
                    <ul class="reg-log">
                        <li>
                            <a href="#">{{ trans('clients.register') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ trans('clients.login') }}</a>
                        </li>
                    </ul>
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
