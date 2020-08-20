<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">{{ trans('clients.name_website') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{ trans('clients.menu') }}
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">{{ trans('clients.home') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ trans('clients.shop') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="shop.html">{{ trans('clients.shop') }}</a>
                    </div>
                </li>
                <li class="nav-item"><a href="about.html" class="nav-link">{{ trans('clients.about') }}</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">{{ trans('clients.blog') }}</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">{{ trans('clients.contact') }}</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="cart.html" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                        {{ trans('client.number_item') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
