<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="back-top">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">{{ trans('clients.menu') }}</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">{{ trans('clients.home') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ trans('clients.product') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ trans('clients.news') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ trans('clients.introduce') }}</a></li>
                        <li><a href="#" class="py-2 d-block">{{ trans('clients.delivery_regulations') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ trans('clients.help') }}</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.shipping') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.return') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.terms') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.privacy') }}</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.faq') }}</a></li>
                            <li><a href="#" class="py-2 d-block">{{ trans('clients.contact') }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ trans('clients.question') }}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span>
                                <span class="text">{{ config('foot.address') }}</span>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">{{ config('foot.phone') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">{{ config('foot.email') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    {{ config('foot.copyright') }}
                </p>
            </div>
        </div>
    </div>
</footer>
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular">
        <circle class="path-bg"/>
        <circle class="path"/>
    </svg>
</div>
