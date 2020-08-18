@include('admin.layouts.common.head')

<body id="page-top">
    <div id="wrapper">

        @include('admin.layouts.common.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('admin.layouts.common.topbar')

                @yield('content')
            </div>

        </div>

    </div>

@include('admin.layouts.common.foot')
