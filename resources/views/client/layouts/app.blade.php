<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ trans('clients.title') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('client.layouts.common.header-css')
    </head>
    <body class="goto-here">

    @include('client.layouts.common.navbar')

    @yield('content')

    @include('client.layouts.common.section')

    @include('client.layouts.common.section-partner')

    @include('client.layouts.common.footer')

    @include('client.layouts.common.foot')

    </body>
</html>
