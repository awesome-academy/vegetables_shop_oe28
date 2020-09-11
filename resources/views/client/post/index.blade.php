@extends('client.layouts.app-post')

@section('content')

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-12 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                @php $image = $post->images()->first(); @endphp
                                <a href="#">
                                    @if (isset($image))
                                        <img class="img-fea-post" src="{{ asset(config('path-img.img') . $image['image_path']) }}"
                                             alt="{{ $post->name }}">
                                    @else
                                        <img class="img-fea-post" src="{{ config('path-img.default-posts') }}"
                                             alt="{{ $post->name }}">
                                    @endif
                                </a>
                                <div class="text d-block pl-md-4">
                                    <div class="meta mb-3">
                                        <div><a href="#">{{ date('d-m-Y', strtotime($post->updated_at)) }}</a></div>
                                    </div>
                                    <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                                    <p>{{ $post->intro }}</p>
                                    <p><a href="#" class="btn btn-primary py-2 px-3">{{ trans('clients.read_more') }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {!! $posts->links() !!}
                </div>
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="{{ trans('clients.search') }}">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">{{ trans('clients.categories') }}</h3>
                        <ul class="categories">
                            @foreach ($categories as $count=>$category)
                                <li>
                                    <a href="#">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3 class="heading">{{ trans('clients.recent_blog') }}</h3>
                        @foreach ($post_recents as $post_recent)
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4">
                                @php $image = $post_recent->images->first(); @endphp
                                @if (isset($image))
                                    <img class="img-recent" src="{{ asset(url(config('path-img.img') . $image['image_path'])) }}"
                                        alt="{{ $post_recent->name }}">
                                @else
                                    <img class="img-recent" src="{{ config('path-img.default-posts') }}"
                                        alt="{{ $post_recent->name }}">
                                @endif
                            </a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">{{ $post_recent->title }}</a></h3>
                                <div class="meta">
                                    <div>
                                        <a href="#">
                                            <span class="icon-calendar"></span>
                                            {{ date('d-m-Y', strtotime($post->updated_at)) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
